<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
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
    // public function detailsRooms()
    // {
    //     return view('pages.DetailRooms');
    // }
    // Contact page
    public function contact()
    {
        return view('pages.ContactPage');
    }

    public function profile()
    {
        return view('pages.ProfilePage');
    }
}
