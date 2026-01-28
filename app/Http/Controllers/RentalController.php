<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function index()
    {
        // Get available rooms for new rentals
        $availableRooms = Room::whereDoesntHave('rentals', function ($q) {
            $q->where('status', 'ongoing');
        })->get();

        // Get all rooms for editing (needed when editing existing rentals)
        $allRooms = Room::all();

        $tenants = Rental::with(['tenant','room','tenant.user'])->get();
        return view('admin.TenantsPage', compact('availableRooms', 'allRooms', 'tenants'));
    }
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id'      => ['nullable'],
            'name'         => ['required', 'string', 'max:30'],
            'gender'       => ['required', 'in:male,female,other'],
            'phone'        => ['required', 'string', 'max:20'],
            'address'      => ['required', 'string'],
            'room_id'      => [
                'required',
                'exists:rooms,id',
                function($attribute, $value, $fail) {
                    // ការកែតម្រូវ៖ ពិនិត្យមើលស្ថានភាពបន្ទប់ក្នុង Table RENTALS
                    $roomOccupied = Rental::where('room_id', $value)
                        ->where('status', 'ongoing')
                        ->exists();
                    if ($roomOccupied) {
                        $fail('បច្ចុប្បន្នបន្ទប់នេះមានអ្នកស្នាក់នៅរួចហើយ (Room is already occupied).');
                    }
                }
            ],
            'rent_amount'  => ['required', 'numeric', 'min:0'],
            'move_in_date' => ['required', 'date'],
            'move_out_date'=> ['nullable', 'date', 'after_or_equal:move_in_date'],
            // 'status'       => ['required', 'in:ongoing,completed,cancelled'],

        ]);

        DB::transaction(function() use ($request) {
            // ១. បង្កើត ឬធ្វើបច្ចុប្បន្នភាពព័ត៌មានអ្នកជួល
            $tenant = Tenant::create([
                'user_id' => null,
                'name'    => $request->name,
                'gender'  => $request->gender,
                'phone'   => $request->phone,
                'address' => $request->address,
            ]);

            // ២. បង្កើតទិន្នន័យការជួល
            Rental::create([
                'tenant_id'     => $tenant->id,
                'room_id'       => $request->room_id,
                'rent_amount'    => $request->rent_amount,
                'move_in_date'  => $request->move_in_date,
                'move_out_date' => $request->move_out_date,
                'status'        => 'ongoing',
            ]);
            Room::where('id', $request->room_id)->update([
                'status' => 'occupied',
            ]); 
        });

        return redirect()->route('admin.tenants')->with('success', 'ចុះឈ្មោះអ្នកជួលបានជោគជ័យ!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        $rental->load(['tenant', 'room', 'tenant.user']);
        return response()->json($rental);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'name'         => ['required', 'string', 'max:30'],
            'gender'       => ['required', 'in:male,female,other'],
            'phone'        => ['required', 'string', 'max:20'],
            'address'      => ['required', 'string'],
            'room_id'      => [
                'required',
                'exists:rooms,id',
                function($attribute, $value, $fail) use ($rental) {
                    // Check if room is occupied by another rental
                    $roomOccupied = Rental::where('room_id', $value)
                        ->where('status', 'ongoing')
                        ->where('id', '!=', $rental->id)
                        ->exists();
                    if ($roomOccupied) {
                        $fail('បច្ចុប្បន្នបន្ទប់នេះមានអ្នកស្នាក់នៅរួចហើយ (Room is already occupied).');
                    }
                }
            ],
            'rent_amount'  => ['required', 'numeric', 'min:0'],
            'move_in_date' => ['required', 'date'],
            'move_out_date'=> ['nullable', 'date', 'after_or_equal:move_in_date'],
            'status'       => ['required', 'in:ongoing,completed,cancelled'],
        ]);

        DB::transaction(function() use ($request, $rental) {
            // Update tenant information
            $rental->tenant->update([
                'name'    => $request->name,
                'gender'  => $request->gender,
                'phone'   => $request->phone,
                'address' => $request->address,
            ]);

            // Update old room status if room changed
            if ($rental->room_id != $request->room_id) {
                Room::where('id', $rental->room_id)->update([
                    'status' => 'available',
                ]);
                
                // Update new room status
                Room::where('id', $request->room_id)->update([
                    'status' => 'occupied',
                ]);
            }

            // Update rental information
            $rental->update([
                'room_id'       => $request->room_id,
                'rent_amount'   => $request->rent_amount,
                'move_in_date'  => $request->move_in_date,
                'move_out_date' => $request->move_out_date,
                'status'        => $request->status,
            ]);

            // Update room status based on rental status
            if ($request->status != 'ongoing') {
                Room::where('id', $request->room_id)->update([
                    'status' => 'available',
                ]);
            }
        });

        return redirect()->route('admin.tenants')->with('success', 'ធ្វើបច្ចុប្បន្នភាពព័ត៌មានបានជោគជ័យ! (Updated successfully!)');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
