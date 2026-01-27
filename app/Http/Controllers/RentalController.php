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
        // សម្រាប់បង្ហាញ available rooms នៅ modal
        $availableRooms = Room::where('status', 'available')->get();
        // ទៅ tenants page
        return view('admin.TenantsPage', compact('availableRooms'));
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
                        ->where('status', 'active')
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

        return redirect()->route('admintenants')->with('success', 'ចុះឈ្មោះអ្នកជួលបានជោគជ័យ!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
