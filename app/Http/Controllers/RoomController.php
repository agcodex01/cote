<?php

namespace App\Http\Controllers;

use App\Filters\RoomFilter;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoomFilter $filter)
    {
        $headers = ['Rooms'];

        $rooms = Room::filter($filter)->paginate(10);

        return view('rooms.index', compact('headers', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $data = Room::create($data);

        return back()->with('success', 'Room Succcessfully Added!');
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
        $data = $request->validate([
            'name' => 'required',
        ]);

        $room->update($data);

        return back()->with('success', 'Room Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return back()->with('success', 'Room Succcessfully Deleted!');
    }
}
