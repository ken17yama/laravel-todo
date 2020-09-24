<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // 必要情報のバリデーション

        // Room::create($request->all());
        // return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    public function show($room_id)
    {
        $todos = Todo::where('room_id', $room_id)->orderBy('id', 'desc')->get();

        return view('room.show', compact('todos'));
    }

    public function edit(Room $room)
    {
        //
    }

    public function update(Request $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        //
    }
}
