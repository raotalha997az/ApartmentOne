<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PropertyApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $tries = 3;
    public $timeout = 120;
    protected $property;
    protected $tenant;

    public function __construct($property, $tenant)
    {
        $this->property = $property;
        $this->tenant = $tenant;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Property Application')
            ->line('Your property "' . $this->property->name . '" has been applied by the tenant "' . $this->tenant->name . '".')
            ->action('View Property', url('landlord/propertiesdetails/' . $this->property->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your property ' . $this->property->name . '" has been applied by the tenant "' . $this->tenant->name . '".',
            'property_id' => $this->property->id,
        ];
    }
}
