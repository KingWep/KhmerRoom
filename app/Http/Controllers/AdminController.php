<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Admin\RoomController;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

            // Get current month payments
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;
            
            // Monthly income (paid this month)
            $monthlyIncome = Payment::whereMonth('paid_date', $currentMonth)
                ->whereYear('paid_date', $currentYear)
                ->where('status', 'paid')
                ->sum('amount_paid');
            
            // Unpaid/Pending payments
            $pendingPayments = Payment::where('status', 'pending')->get();
            $unpaidAmount = $pendingPayments->sum('amount_paid');
            $pendingCount = $pendingPayments->count();
            
            // Recent payments (last 5)
            $recentPayments = Payment::with(['rental.tenant', 'rental.room'])
                ->orderBy('paid_date', 'desc')
                ->limit(5)
                ->get();

            // Total tenants and active rentals
            $totalTenants = Tenant::count();
            $activeRentals = Rental::where('status', 'ongoing')->count();

            return view('admin.Dashboard', compact(
                'totalRooms',
                'availableRooms',
                'occupiedRooms',
                'maintenanceRooms',
                'rooms',
                'monthlyIncome',
                'unpaidAmount',
                'pendingCount',
                'recentPayments',
                'totalTenants',
                'activeRentals'
            ));
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ! ' . $th->getMessage());
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

        // ទាញយកបន្ទប់ទាំងអស់សម្រាប់ edit mode
        $allRooms = Room::all();

        // ទាញយកបញ្ជីការជួលទាំងអស់មកបង្ហាញក្នុង Table with pagination
        $tenants = Rental::with(['room', 'tenant', 'tenant.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // បញ្ជូនទៅកាន់ View admin/TenantsPage.blade.php
        return view('admin.TenantsPage', compact('availableRooms', 'allRooms', 'tenants'));
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
        $currentYear = Carbon::now()->year;
        
        // Khmer month names
        $khmerMonths = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];
        
        // Initialize arrays for monthly data
        $monthlyIncome = [];
        $monthlyPending = [];
        $monthlyTotal = [];
        $monthlyDataByIndex = [];
        
        // Get all payments for current year
        $allPayments = Payment::whereYear('paid_date', $currentYear)->get();
        
        // Calculate monthly data
        for ($i = 1; $i <= 12; $i++) {
            $monthPayments = $allPayments->filter(function($payment) use ($i) {
                return Carbon::parse($payment->paid_date)->month == $i;
            });
            
            $paidAmount = $monthPayments->where('status', 'paid')->sum('amount_paid');
            $pendingAmount = $monthPayments->where('status', 'pending')->sum('amount_paid');
            
            $monthlyIncome[] = (float)$paidAmount;
            $monthlyPending[] = (float)$pendingAmount;
            $monthlyTotal[] = (float)($paidAmount + $pendingAmount);
            
            // Store indexed data for pagination
            $monthlyDataByIndex[$i - 1] = [
                'index' => $i,
                'income' => (float)$paidAmount,
                'pending' => (float)$pendingAmount,
                'total' => (float)($paidAmount + $pendingAmount)
            ];
        }
        
            // Paginate monthly data (use custom page name `page_monthly` to avoid conflict
            // with the other paginator on the same page)
            $perPage = request('per_page_monthly', 12);
            $currentPage = (int) request('page_monthly', 1);
            $monthlyDataCollection = collect($monthlyDataByIndex);

            $monthlyData = new \Illuminate\Pagination\LengthAwarePaginator(
                $monthlyDataCollection->forPage($currentPage, $perPage)->values()->values(),
                $monthlyDataCollection->count(),
                $perPage,
                $currentPage,
                [
                    'path' => route('admin.reports'),
                    'pageName' => 'page_monthly',
                    'fragment' => 'monthly-table'
                ]
            );

            // Preserve per_page_monthly in pagination URLs
            $monthlyData->appends(['per_page_monthly' => $perPage]);

        // Room status statistics
        $roomStatus = [
            ['name' => 'ទំនេរ', 'value' => Room::where('status', 'available')->count(), 'color' => '#22c55e'],
            ['name' => 'មានអ្នកជួល', 'value' => Room::where('status', 'occupied')->count(), 'color' => '#3b82f6'],
            ['name' => 'កំពុងជួសជុល', 'value' => Room::where('status', 'maintenance')->count(), 'color' => '#f59e0b'],
        ];

        // Calculate totals
        $totalIncome = array_sum($monthlyIncome);
        $totalPending = array_sum($monthlyPending);
        $monthsWithData = count(array_filter($monthlyIncome));
        $avgIncome = $monthsWithData > 0 ? $totalIncome / $monthsWithData : 0;

        // Get recent payments for the table with pagination
        $perPagePayments = request('per_page', 10);
        $allowedPerPage = [10, 15, 25];
        if (!in_array($perPagePayments, $allowedPerPage)) {
            $perPagePayments = 10;
        }
        
        $recentPayments = Payment::with(['rental.tenant', 'rental.room'])
            ->whereYear('paid_date', $currentYear)
            ->orderBy('paid_date', 'desc')
            ->paginate($perPagePayments);
        // Preserve per_page in pagination links
        $recentPayments->appends(request()->query());

        // Summary statistics
        $totalRooms = Room::count();
        $totalTenants = Tenant::count();
        $activeRentals = Rental::where('status', 'ongoing')->count();
        $totalPayments = $allPayments->count();

        return view('admin.ReportsPage', compact(
            'khmerMonths',
            'monthlyIncome',
            'monthlyPending',
            'monthlyTotal',
            'monthlyData',
            'roomStatus',
            'totalIncome',
            'totalPending',
            'avgIncome',
            'recentPayments',
            'totalRooms',
            'totalTenants',
            'activeRentals',
            'totalPayments',
            'currentYear'
        ));
    }
}