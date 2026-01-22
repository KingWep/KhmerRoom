<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
        */
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
            return redirect()->route('admin.rooms.index')->with('message', 'Room created successfully');
        } catch (\Exception $e) {
            // Log the actual error so you can find it in storage/logs/laravel.log
            // \Log::error("Room Creation Error: " . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
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
    public function edit($id, Request $request) 
    {
        try {
            $room = Room::findOrFail($id);
            $ValidateData = $request->validate([
                'room_number'=>['sometimes','integer','unique:rooms,room_number'],
                'floor'=>['sometimes','integer'],
                'price'=>['sometimes','numeric'],
                'status'=>['sometimes','in:available,occupied,maintenance'],
                'images'=>['nullable','file','mimes:png,jpg,jpeg','max:2048'],
                'description'=>['nullable','string'],
                'size'=>['sometimes','numeric'],
                'accessories'=>['nullable','array'], 
            ]);
            if($request->hasFile('images')){
                $image = $request->file('images')->storeOnCloudinary('room_images');
                $ValidateData['images'] = $image->getSecurePath();
            }
            $room->update($ValidateData);
            return redirect()->route('admin.rooms.index')->with('message', 'Room updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error updating room: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
