<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PropertyApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $tries = 3; 
    public $timeout = 120;
    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Property Approved')
            ->line('Your property "' . $this->property->name . '" has been approved by the admin.')
            ->action('View Property', url('landlord/propertiesdetails/' . $this->property->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your property ' . $this->property->name . ' has been approved.',
            'property_id' => $this->property->id,
        ];
    }
}
