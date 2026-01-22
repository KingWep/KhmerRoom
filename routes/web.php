<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController; // You'll need this
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

// 1. Public Routes
Route::get('/', [PublicController::class, 'index'])->name('public.home');
Route::get('/rooms', [PublicController::class, 'rooms'])->name('public.rooms');
Route::get('/rooms', [RoomController::class, 'rooms'])->name('public.rooms');
Route::get('/about', [PublicController::class, 'about'])->name('public.about');
Route::get('/contact', [PublicController::class, 'contact'])->name('public.contact');
//2. Guest Route only (Login/Register)
Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class, 'ShowLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'ShowRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});
// 3. Authenticated Routes User (General User)
Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/my-profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('user.profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::patch('/update-profile/{id}',[UserController::class,'update'])->name('user.update.profile');
});

// --- 3. Admin Routes (The "Admin Dashboard" Box) ---
// I suggest using a prefix 'admin' to keep URLs clean
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Profile & Auth
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('admin.profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::patch('/update-profile/{id}',[UserController::class,'update'])->name('admin.update.profile');

    // Core Admin Pages
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/tenants', [AdminController::class, 'tenants'])->name('admin.tenants');
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
    
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');

    //Rooms Management
    // Route::post('/rooms',[RoomController::class,'create'])->name('admin.rooms.create');
    // Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::post('/admin/rooms', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::patch('/rooms/{id}',[RoomController::class,'update'])->name('admin.rooms.update'); // optional if using modal
});