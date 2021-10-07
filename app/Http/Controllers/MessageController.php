<?php

namespace App\Http\Controllers;

use App\Events\MessageDelivered;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $message = Message::all();
        return view('user.message' , compact('message'));
    }

    public function store(Request $request)
    {
        $message = auth()->user()->messages()->create($request->all());
        broadcast(new MessageDelivered($message->load('user')))->toOthers();
    }
}
