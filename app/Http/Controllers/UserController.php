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
    public function update(Request $request, $id){
        try {
            $validatedData = $request->validate([
                'name'=>['sometimes','string','min:3'],
                'email'=>['sometimes','email','unique:user,email'. $id],
                'password'=>['sometimes','string','min:8','confirmed'],
                'profile'=>['nullable','file','mimes:png,jpg,jpeg'],
            ]);
            if($request->hasFile('profile')){
                $file = $request->file('profile');
                $FileName = time()."_".$file->getClientOriginalName();
                $file->storeAs('images', $FileName, 'public');
                $image_url = asset('storage/images/'.$FileName);
                $validatedData['profile'] = $image_url;
            }
            $user = User::findOrFail($id);
            $user->update($validatedData);
            return redirect()->route('user.profile')->with('message','Update profile successfully');
        } catch (\Throwable $th) {
            return back()->with('error','មានបញ្ហា៖ '.$th->getMessage());
        }
        
    }
}