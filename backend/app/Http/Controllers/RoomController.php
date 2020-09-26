<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $rooms = User::find($id)->rooms()->orderBy('id')->get();

        return view('room.index', compact('rooms'));
    }

    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $id = Auth::id();
        $create_result = Room::create($request->all());
        DB::table('room_user')->insert(
            [
                'user_id' => $id,
                'room_id' => $create_result->id,
            ]
        );

        return redirect()->route('room.index')->with('success', 'Room created successfully.');
    }

    public function show($room_id)
    {
        $todos = Todo::where('room_id', $room_id)->orderBy('id', 'desc')->get();

        return view('room.show', compact('todos'));
    }

    public function edit($room_id)
    {
        $room = Room::find($room_id);
        return view('room.edit', compact('room'));
    }

    public function update(Request $request, Room $room, $room_id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $room = Room::find($room_id);
        $room->name = $request->name;
        $room->description = $request->description;
        $room->save();

        return redirect()->route('room.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($room_id)
    {
        Room::where('id', $room_id)->delete();
        DB::table('room_user')->where('room_id', $room_id)->delete();

        return redirect()->route('room.index')->with('success', 'Room deleted successfully.');
    }
}
