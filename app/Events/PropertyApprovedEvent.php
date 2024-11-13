<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyApprovedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $userId;
    public $notificationId;  // Add notificationId to the event

    public function __construct($userId, $message, $notificationId)
    {
        $this->userId = $userId;
        $this->message = $message;
        $this->notificationId = $notificationId;  // Pass notificationId
    }

    public function broadcastOn()
    {
        return new Channel('notifications');
    }

    public function broadcastAs()
    {
        return 'property_approved';
    }

    // Include notificationId in broadcasted data
    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'userId' => $this->userId,
            'notificationId' => $this->notificationId,  // Broadcast notificationId
        ];
    }
}

