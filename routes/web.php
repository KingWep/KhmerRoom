<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Pages (អ្នកណាក៏អាចមើលបាន មិនបាច់ Login)
Route::get('/',[PublicController::class,'index'])->name('home');
Route::get('/contact',[PublicController::class,'contact'])->name('contact');
Route::get('/rooms', [PublicController::class, 'rooms'])->name('rooms');
Route::get('/login', [PublicController::class, 'login'])->name('login');
Route::get('/register', [PublicController::class, 'register'])->name('register');


Route::middleware(['auth',])->group(function(){
    // សម្រាប់ Role ជា User
    Route::get('/',[UserController:: class,'index'])->name('home');

});