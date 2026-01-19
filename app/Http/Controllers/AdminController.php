<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            return view('admin.Dashboard');
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
    public function tenants()
    {
        try {
            return view('admin.TenantsPage');
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
    public function rooms()
    {
        try {
            return view('admin.RoomsControl');
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មិនអាចចូលទៅកាន់ Dashboard បានឡើយ!');
        }
    }
}