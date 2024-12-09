<?php

namespace App\Console;

use App\Services\LoginService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('payments:expire')->daily();
        $schedule->call(function () {
            $loginService = app(LoginService::class);

            // Simulate login to set tokens if they are missing
            if (!Cache::has('refresh_token')) {
                $loginService->login(env('CLIENT_ID'), env('CLIENT_SECRET'));
            }
            $loginService->refreshToken();
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $commands = [
        \App\Console\Commands\ExpirePayments::class,
    ];

}
