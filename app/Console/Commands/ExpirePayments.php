<?php

namespace App\Console\Commands;

use Log;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpirePayments extends Command
{
    protected $signature = 'payments:expire';
    protected $description = 'Expire user payments after 90 days';


    public function handle()
    {
        // Manually set expiration date for testing (optional, can be removed later)
        $user = User::find(5);  // Find user by ID (in this case, Boss)
        $user->payment_expires_at = now()->subDays(1);  // Set expiry date 1 day ago for testing
        $user->save();

        // Fetch all users whose payments should expire
        $users = User::where('payment_status', true)
            ->where('payment_expires_at', '<', now())
            ->get();

        // Log the expired payments for debugging purposes
        foreach ($users as $user) {
            Log::info('Expiring payment for user:', ['id' => $user->id, 'expires_at' => $user->payment_expires_at]);
        }

        // Update payment status to expired for all users whose payment expiry date has passed
        $count = User::where('payment_status', true)
            ->where('payment_expires_at', '<', now())
            ->update(['payment_status' => false]);

        // Display success message with the number of expired payments
        $this->info("$count payments expired successfully.");
    }
}
