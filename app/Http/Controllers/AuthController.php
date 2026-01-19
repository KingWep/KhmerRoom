<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $file->storeAs('images', $FileName, 'public');
            $image_url = asset('storage/images/'.$FileName);

        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = $image_url;
        $user->save();
        if($user){
            return redirect()->route('login')->with('message','Register successfully, please login');
        }
        return view('pages.RegisterPage');
     }
    public function ShowLogin(){
        return view('pages.LoginPage');
    }
    public function showProfile(){
        return view('pages.ProfilePage');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required','string','min:8']
        ]);
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            // 3. Logic to redirect based on role
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->intended(route('user.profile'));
        }
        return redirect()->route('login');;
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('public.home')->with('message', 'អ្នកបានចាកចេញពីគណនីដោយជោគជ័យ!');
    }
}
