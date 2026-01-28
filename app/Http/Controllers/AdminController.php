<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Admin\RoomController;
use App\Models\Rental;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            // Get room statistics
            $totalRooms = Room::count();
            $availableRooms = Room::where('status', 'available')->count();
            $occupiedRooms = Room::where('status', 'occupied')->count();
            $maintenanceRooms = Room::where('status', 'maintenance')->count();
            
            // Get all rooms with their details for the room status grid
            $rooms = Room::all()->map(function($room) {
                return [
                    'no' => $room->room_number,
                    'floor' => $room->floor,
                    'status' => $room->status
                ];
            });

            return view('admin.Dashboard', compact(
                'totalRooms',
                'availableRooms',
                'occupiedRooms',
                'maintenanceRooms',
                'rooms'
            ));
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
    // public function tenants()
    // {
    //     try {
    //         return view('admin.TenantsPage');
    //     } catch (\Throwable $th) {
    //         return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
    //     }
    // }
    public function tenants()
{
    // ទាញយកបន្ទប់ដែលទំនេរ (មិនមានការជួលសកម្ម)
    $availableRooms = Room::whereDoesntHave('rentals', function($q){
        $q->where('status', 'ongoing');
    })->get();

    // ទាញយកបញ្ជីការជួលទាំងអស់មកបង្ហាញក្នុង Table
    $tenants = Rental::with(['room', 'tenant', 'tenant.user'])->get();

    // បញ្ជូនទៅកាន់ View admin/TenantsPage.blade.php
    return view('admin.TenantsPage', compact('availableRooms', 'tenants'));
}
    public function rooms()
    {
        try {
            return view('admin.RoomsControl');
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
    public function payments()
    {
        try {
            return view('admin.Payments');
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
    public function reports()
    {
        try {
            return view('admin.ReportsPage');
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
}