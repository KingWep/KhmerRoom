<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes 
Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/contact',[UserController::class,'contact'])->name('contact');
Route::get('/rooms', [UserController::class, 'rooms'])->name('rooms');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');