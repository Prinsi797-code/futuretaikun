<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Entrepreneur;
use App\Models\Investor;
use App\Mail\IncompleteProfileReminderMail;

class SendIncompleteProfileReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send-incomplete-profile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder email to users who have not completed their role-specific profile';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailsSent = 0;

        $users = User::where('is_verified', true)->get();

        foreach ($users as $user) {
            if ($user->role === 'entrepreneur') {
                $exists = Entrepreneur::where('user_id', $user->id)->exists();

                if (!$exists) {
                    Mail::to($user->email)->send(
                        new IncompleteProfileReminderMail($user->name, 'entrepreneur', $user->email)
                    );
                    $emailsSent++;
                    $this->info("Reminder sent to entrepreneur: {$user->email}");
                }
            }

            if ($user->role === 'investor') {
                $exists = Investor::where('user_id', $user->id)->exists();

                if (!$exists) {
                    Mail::to($user->email)->send(
                        new IncompleteProfileReminderMail($user->name, 'investor', $user->email)
                    );
                    $emailsSent++;
                    $this->info("Reminder sent to investor: {$user->email}");
                }
            }
        }

        // Final info log
        $this->info("Total reminder emails sent: {$emailsSent}");
    }
}