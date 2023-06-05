<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Data;
use App\Models\Announcement;
use App\Models\Message;

class AdminController extends Controller
{
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function listRooms()
    {
        $rooms = Rooms::all();
        return view('admin.users.rooms', compact('rooms'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // Update the user with the submitted data
        $user->update($request->all());
        return redirect('/admin/users')->with('success', 'User updated successfully.');
    }
    public function createUser()
    {
        return view('admin.users.create');
    }
    public function storeUser(Request $request)
    {
        // Create a new user with the submitted data
        User::create($request->all());
        return redirect('/admin/users')->with('success', 'User created successfully.');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users')->with('success', 'User deleted successfully.');
    }
    public function createData()
    {
        return view('admin.data.create');
    }
    public function storeData(Request $request)
    {
        // Store the submitted data in the database
        Data::create($request->all());
        return redirect('/admin/data/create')->with('success', 'Data created successfully.');
    }
    public function createAnnouncement()
    {
        return view('admin.announcements.create');
    }
    public function storeAnnouncement(Request $request)
    {
        // Store the submitted announcement in the database
        Announcement::create($request->all());
        return redirect('/admin/announcements/create')->with('success', 'Announcement created successfully.');
    }
    public function createMessage()
    {
        return view('admin.messages.create');
    }
    public function storeMessage(Request $request)
    {
        // Store the submitted message in the database
        Message::create($request->all());
        return redirect('/admin/messages/create')->with('success', 'Message sent successfully.');
    }
}
