<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $sender = Auth::user();
        $receiver = User::findOrFail($request->receiver_id);

        // Check if the sender is a landlord and the receiver is a tenant or vice versa
        if (($sender->hasRole('land_lord') && $receiver->hasRole('tenant')) ||
            ($sender->hasRole('tenant') && $receiver->hasRole('land_lord'))) {
            // Send message if roles are valid
            $message = Message::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'message' => $request->message,
            ]);

            return response()->json(['success' => 'Message sent successfully']);
        }

        return response()->json(['error' => 'You are not allowed to message this user.'], 403);
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
