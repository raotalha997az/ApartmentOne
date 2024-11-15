<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function messages()
    {
        return view('Dashboard.messages');
    }                            



    public function sendMessage(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:users,id',  // Validate that the receiver exists
        ]);

        // Get the sender's ID (you could use auth()->id() or something similar)
        $senderId = $request->sender_id;

        // Create the message
        $message = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $validated['receiver_id'],
            'message' => $validated['message'],
        ]);


        // Broadcast the event
        broadcast(new MessageSent($message));  // MessageSent is the event you defined for broadcasting

        return response()->json(['status' => 'Message sent successfully']);
    }

    public function getMessages($receiverId)
    {
        $sender = Auth::user();
        $receiver = User::findOrFail($receiverId);

        // Check if the sender is allowed to send messages to this receiver
        if (($sender->hasRole('land_lord') && $receiver->hasRole('tenant')) ||
            ($sender->hasRole('tenant') && $receiver->hasRole('land_lord'))) {
            // Get all messages between the sender and receiver
            $messages = Message::where(function($query) use ($sender, $receiver) {
                $query->where('sender_id', $sender->id)
                      ->where('receiver_id', $receiver->id);
            })->orWhere(function($query) use ($sender, $receiver) {
                $query->where('sender_id', $receiver->id)
                      ->where('receiver_id', $sender->id);
            })->get();

            return response()->json(['messages' => $messages]);
        }

        return response()->json(['error' => 'You are not allowed to access messages with this user.'], 403);
    }
}
