<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.HomePage');
});
Route::get('/contact', function () {
    return view('pages.ContactPage');
});
Route::get('/rooms', function () {
    return view('pages.RoomsPage');
});
Route::get('/login', function () {
    return view('pages.LoginPage');
});
Route::get('/register', function () {
    return view('pages.RegisterPage');
});
Route::get('/dashboard', function () {
    return view('layouts.LayoutsAdmin');
});
Route::get('/tenants', function () {
    return view('admin.TenantsPage');
});