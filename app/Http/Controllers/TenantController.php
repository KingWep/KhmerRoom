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
