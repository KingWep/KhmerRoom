<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group.
|
*/

// ============================================================================
// PUBLIC ROUTES (Accessible to everyone)
// ============================================================================

Route::get('/', [RoomController::class, 'homeRooms'])->name('public.home');
Route::get('/rooms', [RoomController::class, 'roomsRooms'])->name('public.rooms');
Route::get('/about', [PublicController::class, 'about'])->name('public.about');
Route::get('/contact', [PublicController::class, 'contact'])->name('public.contact');

// ============================================================================
// GUEST ROUTES (Only for non-authenticated users)
// ============================================================================

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    
    // Register
    Route::get('/register', [AuthController::class, 'ShowRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// ============================================================================
// USER ROUTES (Authenticated regular users)
// ============================================================================

Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    // Profile Management
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('user.profile');
    Route::patch('/profile/{id}', [UserController::class, 'update'])->name('user.update.profile');
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
});

// ============================================================================
// ADMIN ROUTES (Authenticated admin users)
// ============================================================================

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // --------------------------------------------------------------------
    // Profile & Authentication
    // --------------------------------------------------------------------
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::patch('/profile/{id}', [UserController::class, 'update'])->name('update.profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // --------------------------------------------------------------------
    // Dashboard & Main Pages
    // --------------------------------------------------------------------
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tenants', [AdminController::class, 'tenants'])->name('tenants');
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('rooms');
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    
    // --------------------------------------------------------------------
    // Room Management (CRUD Operations)
    // --------------------------------------------------------------------
    Route::prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::post('/', [RoomController::class, 'create'])->name('create');
        Route::patch('/{id}', [RoomController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoomController::class, 'destroy'])->name('delete');
    });
    
    // --------------------------------------------------------------------
    // Rental Management (CRUD Operations)
    // --------------------------------------------------------------------
    Route::prefix('rentals')->name('rentals.')->group(function () {
        Route::get('/', [RentalController::class, 'index'])->name('index');
        Route::post('/', [RentalController::class, 'store'])->name('store');
    });
});
