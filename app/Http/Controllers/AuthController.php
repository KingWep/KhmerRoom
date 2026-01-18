<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
    public function ShowRegister(){
        return view('pages.RegisterPage');
    }
     public function register(Request $request){
        $request->validate([
            'name'=>['required','string','min:3'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','string','min:8','confirmed'],
            'profile'=>['nullable','file','mimes:png,jpg,jpeg'],
        ]);
        $FileName = null;
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $FileName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('images'),$FileName);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $FileName;
        $user->save();
        if($user){
            return redirect()->route('login')->with('message','Register successfully, please login');
        }
     }
    public function ShowLogin(){
        return view('pages.LoginPage');
    }
}
