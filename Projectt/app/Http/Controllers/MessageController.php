<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        // Store the submitted message in the database
        Message::create($request->all());
        return redirect('/messages')->with('success', 'Message sent successfully.');
    }
}
