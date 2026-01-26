<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $rentals = Rental::with(['tenant', 'room'])
            ->latest()
            ->paginate(10);

        return view('rentals.index', compact('rentals'));
    }

    //
    //   Show the form for creating a new resource.
    
     public function create()
     {
         // បង្ហាញតែបន្ទប់ដែលទំនេរ
         $rooms = Room::where('status', 'available')->get();
         return view('rentals.create', compact('rooms'));
     }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         // Tenant types
    //         'tenant_type' => ['required','in:user,guest'],
    //         // If tenant has account
    //         'user_id' => ['required_if:tenant_type,user','exists:users,id'],
    //         // Tenant info (required for both)
    //         'name'           => ['required','string','max:30'],
    //         'gender'         => ['required','in:male,female,other'],
    //         'phone'          => ['required','string','max:20','unique:tenants,phone'],
    //         'address'        => ['required','string'],
    //         // Rental
    //         'room_id'      => [
    //             'required',
    //             'exists:rooms,id',
    //             function($attribute, $value, $fail) use ($request) {
    //                 // Custom validation: check if room is available
    //                 $roomOccupied = Tenant::where('room_id', $value)
    //                     ->where('status', 'active')
    //                     ->exists();
    //                 if ($roomOccupied) {
    //                     $fail('The selected room is already occupied.');
    //                 }
    //             }
    //         ],
    //         'rent_price'     => ['required','numeric','min:0'],
    //         'move_in_date'   => ['required','date'],
    //         'move_out_date'  => ['nullable','date'],
    //         'status'         => ['required','in:active,inactive'],
    //     ]);
    //     DB::transaction(function() use ($request) {
    //         // Create Tenant
    //         $tenant = new Tenant;
    //         $tenant->user_id = $request->tenant_type === 'user' ? $request->user_id : null;
    //         $tenant->name = $request->name;
    //         $tenant->gender = $request->gender;
    //         $tenant->phone = $request->phone;
    //         $tenant->address = $request->address;
    //         $tenant->save();
    //         // Create Rental
    //         $rental = new Rental;
    //         $rental->tenant_id = $tenant->id;
    //         $rental->room_id = $request->room_id;
    //         $rental->rent_price = $request->rent_price;
    //         $rental->move_in_date = $request->move_in_date;
    //         $rental->move_out_date = $request->move_out_date;
    //         $rental->status = $request->status;
    //         $rental->save();
    //     });
    //     return redirect()->route('rentals.index')->with('message', 'Tenant and rental created successfully.');
    // }
    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
