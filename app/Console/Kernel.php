<?php

namespace App\Console;

use App\Console\Commands\SendReminderEmails;
use App\Console\Commands\SendIncompleteProfileReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendReminderEmails::class,
        SendIncompleteProfileReminder::class,
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('reminder:send-emails')
            ->dailyAt('03:00')
            ->emailOutputOnFailure('admin@yourdomain.com');

        $schedule->command('reminder:send-incomplete-profile')
            ->dailyAt('08:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}