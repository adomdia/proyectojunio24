<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageContent;
use App\Models\User;

class ChatController extends Controller
{

    public function show($id)
    {
        $receiver = User::find($id);

        
        $messages = MessageContent::orderBy('created_at', 'asc')->where(function ($query) use ($id) {
            $query->where('user_id', auth()->id())
            ->where('foreign_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('user_id', $id)
            ->where('foreign_id', auth()->id());
        })->with(['user', 'foreignUser'])->get();
        
        $userId = auth()->id();

        $messageSenderIds = MessageContent::orderBy('created_at', 'asc')->where('foreign_id', $userId)->pluck('user_id')->toArray();
        $messageReceiverIds = MessageContent::orderBy('created_at', 'asc')->where('user_id', $userId)->pluck('foreign_id')->toArray();

        $chatUserIds = array_unique(array_merge($messageSenderIds, $messageReceiverIds));

        $chatUsers = User::whereIn('id', $chatUserIds)->get();
    

        return view('chat', compact('messages', 'receiver', 'chatUsers'));
    }


    public function sendMessage(Request $request, User $user)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $message = MessageContent::create([
            'user_id' => auth()->id(),
            'foreign_id' =>$request->foreign_id,
            'text' => $request->input('content'),
        ]);


        return response()->json(['message' => $message]);
    }

    public function getMessages(Request $request)
    {
        $lastMessageId = $request->input('lastMessageId');
    
        $messages = MessageContent::where('id', '>', $lastMessageId)
            ->where(function ($query) use ($request) {
                $query->where('foreign_id', auth()->id())
                    ->orWhere('foreign_id', $request->foreign_id);
            })
            ->get();

       
    
        return response()->json(['messages' => $messages, 'lastMessageId' => $lastMessageId]);
    }

}
