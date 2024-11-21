<?php


    namespace App\Http\Controllers;

    use App\Models\Message;
    use App\Models\User;
    use App\Events\MessageSent;

    use Illuminate\Http\Request;
    use App\Events\MessageSentEvent;
use App\Models\ApplyPropertyHistory;
use Illuminate\Support\Facades\Auth;

    class MessageControllerEvent extends Controller
    {
        public function sendMessage(Request $request)
        {
            // Validate the input
            // dd($request->all());
            $validated = $request->validate([
                'sender_id' => 'required|exists:users,id',
                'receiver_id' => 'required|exists:users,id',
                'property_id' => 'required|exists:properties,id',
                'conversation_id' => 'required|exists:applypropertyhistory,id',
                'message' => 'required|string|max:500',
            ]);

            // Create the message
            $message = Message::create($validated);

            // // Broadcast the event
            // broadcast(new MessageSentEvent(
            //     $message->message,
            //     $message->sender_id,
            //     $message->receiver_id,
            // ))->toOthers();

            // event(new MessageSentEvent(
            //     $message->message,
            //     $message->sender_id,
            //     $message->receiver_id,
            // ));

            $message = Message::with(['sender:id,name', 'receiver:id,name'])->find($message->id);

            return response()->json(['message' => 'Message sent successfully!', 'data' => $message]);
        }

        public function fetchMessages(Request $request)
        {
            $messages = Message::with(['sender:id,name', 'receiver:id,name'])
                ->where(function ($query) use ($request) {
                    $query->where('sender_id', $request->sender_id)
                        ->where('receiver_id', $request->receiver_id);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('sender_id', $request->receiver_id)
                        ->where('receiver_id', $request->sender_id);
                })
                ->orderBy('created_at')->get();

            return response()->json($messages);
        }


        public function go_to_chat()
        {
            if(Auth::user()->hasRole('land_lord')){
                $conversations = ApplyPropertyHistory::with(['user', 'property.user'])
                ->whereNull('deleted_at')
                ->whereHas('property.user', function ($query) {
                    $query->where('id', Auth::user()->id); // Filter by the user ID
                })->orderBy('created_at', 'desc')->get();
            }
            if(Auth::user()->hasRole('tenant')){
                $conversations = ApplyPropertyHistory::with(['user','property.user'])->where('user_id', Auth::user()->id)->where('deleted_at',null)->orderBy('created_at', 'desc')->get();
            }
            return view('Dashboard.messages',compact('conversations'));
        }
        public function getMessages(Request $request)
        {
            if(Auth::user()->hasRole('tenant')){
            $history = ApplyPropertyHistory::with(['user','property.user'])->find($request->conversation_id);
            // dd($history->property->user_id);
            $messages = Message::with(['sender:id,name', 'receiver:id,name'])->where('property_id', $history->property_id)->where('conversation_id', $history->id)->get();
            return response()->json([
                'history' => $history,
                'messages' => $messages
            ]);
            }
            $history = ApplyPropertyHistory::with(['user','property.user'])->find($request->conversation_id);
            // dd($history->property_id);
            $messages = Message::with(['sender:id,name', 'receiver:id,name'])->where('property_id', $history->property_id)->where('conversation_id', $history->id)->get();
            return response()->json([
                'history' => $history,
                'messages' => $messages
            ]);
        }


    }
