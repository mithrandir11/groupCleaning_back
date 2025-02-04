<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageMessageController extends Controller
{
    public function index(){
        // $conversations = Conversation::with('messages')->paginate(10);
      
        $conversations = Conversation::with('messages')
        ->orderByDesc(DB::raw('(
            SELECT MAX(messages.created_at)
            FROM messages
            WHERE messages.conversation_id = conversations.id
            AND messages.read_at IS NULL
        )'))
        ->orderByDesc(DB::raw('(
            SELECT MAX(messages.created_at)
            FROM messages
            WHERE messages.conversation_id = conversations.id
        )'))
        ->paginate(10);
        return view('management.messages.index', compact('conversations'));
    }

    public function show(Conversation $conversation){
        // $conversation->load('messages');
        // $messages = $conversation->messages->sortByDesc('created_at');

        DB::transaction(function () use ($conversation) {
            $conversation->messages()->whereNull('read_at')->update(['read_at' => now()]);
            $conversation->load(['messages' => function ($query) {
                $query->orderByDesc('created_at');
            }]);
        });
    
        $messages = $conversation->messages;
        return view('management.messages.show', compact('messages'));
    }

    public function store(Conversation $conversation,Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'recipient_id' => $conversation->user->id,
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
