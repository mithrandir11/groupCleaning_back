<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class WorkerMessageController extends Controller
{
    public function index(){
        $user_id = auth()->id();
        $messages = Message::where('sender_id', $user_id)    
        ->orWhere('recipient_id', $user_id)  
        ->orderBy('created_at','desc')  
        ->get();
        return view('worker.messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $conversation = Conversation::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => auth()->id(),
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
