<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
           $user = User::all();
           if(!$user){
                throw new \Exception("រកមិនឃើញព័ត៌មានអ្នកប្រើប្រាស់ឡើយ។");
           }
            return view('pages.ProfilePage', compact('user'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'មានបញ្ហា៖ ' . $th->getMessage());
        }
    }

    // Rooms page
    public function rooms()
    {
        // You can also pass rooms data from database here if needed
        // $rooms = Room::all();
        // return view('pages.RoomsPage', compact('rooms'));
        return view('pages.RoomsPage');
    }

    // Contact page
    public function contact()
    {
        return view('pages.ContactPage');
    }

    // Login page
    public function login()
    {
        return view('pages.LoginPage');
    }

    // Register page
    public function register()
    {
        return view('pages.RegisterPage');
    }
    public function profile()
    {
        return view('pages.ProfilePage');
    }
}
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;