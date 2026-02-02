<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
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
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('public.rooms.show');
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
    Route::delete('/account/{id}', [UserController::class, 'deleteAccount'])->name('user.delete.account');
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
    Route::delete('/account/{id}', [UserController::class, 'deleteAccount'])->name('delete.account');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // --------------------------------------------------------------------
    // Dashboard & Main Pages
    // --------------------------------------------------------------------
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tenants', [AdminController::class, 'tenants'])->name('tenants');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    
    // --------------------------------------------------------------------
    // Room Management (CRUD Operations)
    // --------------------------------------------------------------------
    Route::prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::post('/', [RoomController::class, 'create'])->name('create');
        Route::patch('/{id}', [RoomController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoomController::class, 'destroy'])->name('delete');
        // autocomplete (NO submit)
        Route::get('/search-rooms', [RoomController::class, 'search']);

    });
    
    // --------------------------------------------------------------------
    // Rental Management (CRUD Operations)
    // --------------------------------------------------------------------
    Route::prefix('rentals')->name('rentals.')->group(function () {
        Route::get('/', [RentalController::class, 'index'])->name('index');
        Route::post('/', [RentalController::class, 'store'])->name('store');
        Route::get('/{rental}', [RentalController::class, 'show'])->name('show');
        Route::patch('/{rental}', [RentalController::class, 'update'])->name('update');
    });
    
    // --------------------------------------------------------------------
    // Payment Management (CRUD Operations)
    // --------------------------------------------------------------------
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::patch('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
});
