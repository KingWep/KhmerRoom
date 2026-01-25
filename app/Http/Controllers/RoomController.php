<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
        */
    // Show to rooms page
    public function roomsRooms(){
        try {
            $rooms = Room::all();
            return view('pages.RoomsPage', compact('rooms'));
        } catch (\Throwable $th) {
            return redirect()->route('public.home')->with('error', 'មានបញ្ហា៖ ' . $th->getMessage());
        }
    }

    public function homeRooms() {
        try {
            // ទាញយកបន្ទប់ដែលមានតម្លៃសមរម្យ (ក្រោម ៧០ដុល្លារ) ចំនួន ៦ បន្ទប់
            $rooms = Room::where('price', '<=', 70)
                         ->limit(6)
                         ->get();

            // ទាញយកទិន្នន័យស្ថិតិសរុប
            $totalRooms = Room::count();
            $availableRooms = Room::where('status', 'available')->count();
            $minPrice = Room::min('price') ?? 0;

            return view('pages.HomePage', compact('rooms', 'totalRooms', 'availableRooms', 'minPrice'));

        } catch (\Throwable $th) {
            return view('pages.HomePage', [
                'rooms' => collect([]), 
                'totalRooms' => 0, 
                'availableRooms' => 0, 
                'minPrice' => 0,
                'error' => $th->getMessage()
            ]);
        }
    }

    public function index(Request $request)
    {
        try {
            $query = Room::query();
            // Use a grouped where for search to avoid conflicting with other filters
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('room_number', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }
            if ($request->filled('floor')) {
                $query->where('floor', $request->floor);
            }
            // Use paginate instead of get() for better performance
            $rooms = $query->latest()->paginate(15); 
            return view('admin.RoomsControl', compact('rooms'));
        } catch (\Exception $e) {    
            // Provide a fallback so the view doesn't crash if you redirect back to it
            return view('admin.RoomsControl', ['rooms' => collect([]), 'error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {       
        $request->validate([
            'room_number'=>['required','integer','unique:rooms,room_number'],
            'floor'=>['required','integer'],
            'price'=>['required','numeric'],
            'status'=>['required','in:available,occupied,maintenance'],
            'images'=>['nullable','file','mimes:png,jpg,jpeg','max:2048'],
            'description'=>['nullable','string'],
            'size'=>['required','numeric'],
            'accessories'=>['nullable','array'],
        ]);
        try {
            $image_url = null;
            if($request->hasFile('images')){
                $file = $request->file('images');
                $uploadedFile = $file->storeOnCloudinary('room_images');
                $image_url = $uploadedFile->getSecurePath();
            }
            $room = new Room;
            $room->room_number = $request->room_number;
            $room->floor = $request->floor;
            $room->price = $request->price;
            $room->status = $request->status;
            $room->images = $image_url;
            $room->description = $request->description;
            $room->size = $request->size;
            $room->accessories = $request->accessories;
            $room->save();
            return redirect()->route('admin.rooms.index')->with('message', 'បន្ទប់ត្រូវបានបង្កើតដោយជោគជ័យ ');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'មានកំហុសក្នុងការបង្កើតបន្ទប់​​ ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
public function update(Request $request, $id) 
{
    try {
        $room = Room::findOrFail($id);
        $ValidateData = $request->validate([
            'room_number' => ['sometimes','integer', Rule::unique('rooms','room_number')->ignore($id)],
            'floor' => ['sometimes','integer'],
            'price' => ['sometimes','numeric'],
            'status' => ['sometimes','in:available,occupied,maintenance'],
            'images' => ['sometimes','nullable','file','mimes:png,jpg,jpeg','max:2048'],
            'description' => ['sometimes','nullable','string'],
            'size' => ['sometimes','numeric'],
            'accessories' => ['sometimes','nullable','array'], 
        ]);

        if ($request->hasFile('images')) {
            $image = $request->file('images')->storeOnCloudinary('room_images');
            $ValidateData['images'] = $image->getSecurePath();
        }

        $room->update($ValidateData);

        return redirect()->route('admin.rooms.index')->with('message', 'បន្ទប់ត្រូវបានធ្វើបច្ចុប្បន្នភាពដោយជោគជ័យ');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'មានកំហុសក្នុងការធ្វើបច្ចុប្បន្នភាព: ' . $th->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
       try {
        $room = Room::findOrFail($id);
        $room = Room::destroy($id);
        return redirect()->route('admin.admin.rooms.delete')->with('message', 'បន្ទប់ត្រូវបានលុបដោយជោគជ័យ');
       } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'មានកំហុសក្នុងការលុបបន្ទប់: ' . $th->getMessage());
       }
    }
}
