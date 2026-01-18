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
    public function show($id)
    {
        
    }
}