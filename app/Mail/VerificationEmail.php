<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    public $user;


    public function __construct($user)
    {
        $this->user = $user; // Ensure $user is an object with a `verification_token` property
    }

    public function build()
    {
        return $this->view('emails.verification')
            ->with('user', $this->user); // Pass user object directly
    }

}

