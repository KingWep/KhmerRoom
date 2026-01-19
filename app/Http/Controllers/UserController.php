<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $validatedData = $request->validate([
                'name'     => ['sometimes', 'string', 'min:3', 'max:255'],
                'email'    => ['sometimes', 'email', 'unique:users,email,' . $id],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'profile'  => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            ]);
            if (!empty($request->password)) {
                $validatedData['password'] = bcrypt($request->password);
            } else {
                unset($validatedData['password']); // Don't update password if it's empty
            }
            if ($request->hasFile('profile')) {
                // Delete old file to save server space
                if ($user->profile && Storage::disk('public')->exists('profiles/' . $user->profile)) {
                Storage::disk('public')->delete('profiles/' . $user->profile);
            }
                $file = $request->file('profile');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->storeAs('profiles', $fileName, 'public');
                $validatedData['profile'] = $fileName;
            }
            $user->update($validatedData);
            return redirect()->back()->with('message', 'ព័ត៌មានត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error: ' . $th->getMessage());
        }
    }
    public function destroy($id){
        try {
             $user = User::findOrFail($id);
             if(auth()->id() !== $user->id && auth()->user()->role !== 'admin'){
                return back()->with('error', 'អ្នកគ្មានសិទ្ធិលុបគណនីនេះទេ! (Unauthorized Access)');
             }
            if (auth()->id() === $user->id) {
                auth()->logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();
                $user->delete();
                return redirect()->route('public.home')->with('message','User deleted successfully');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'មានបញ្ហាបច្ចេកទេស៖ ' . $th->getMessage());
        }
    }
}