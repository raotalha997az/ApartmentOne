<?php

namespace App\Events;

use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $sender_id;
    public $receiver_id;
    // public $sender_name;

    public function __construct($message, $sender_id, $receiver_id)
    {

        $this->message = $message;
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        // $this->sender_name = $sender_name;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    // public function broadcastOn()
    // {
    //     return new Channel("messages.{$this->sender_id}.{$this->receiver_id}");
    // }

    public function broadcastOn(): array
{
    return [new Channel("messages.{$this->sender_id}.{$this->receiver_id}")];
}


    public function broadcastAs()
    {
        return 'messages';
    }

    public function broadcastWith()
    {
        $data = [
            'message' => $this->message,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'sent_at' => now()->toDateTimeString(),
        ];

        Log::info('Broadcasting MessageSentEvent:', $data);

        return $data;
    }
}

