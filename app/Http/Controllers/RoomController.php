<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $rooms = new Room();
            $rooms = Room::all();
            return view('pages.RoomsPage', compact('rooms'));
        } catch (\Throwable $th) {
            // return redirect()->route('')
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
            'size'=>['nullable','numeric'],
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
            return redirect()->route('admin.rooms')->with('message', 'Room created successfully');
        } catch (\Exception $e) {
            // Log the actual error so you can find it in storage/logs/laravel.log
            \Log::error("Room Creation Error: " . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Room $room)
    {
        //
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
