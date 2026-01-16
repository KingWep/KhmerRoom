<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Homepage
    public function index()
    {
        // Return the homepage view
        return view('pages.HomePage');
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
}
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;