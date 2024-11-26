<?php

namespace App\Jobs;

use App\Mail\ContactFormMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ContactFormMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('raheembhutto345@gmail.com')->send(new ContactFormMail ($this->data));
    }
}
