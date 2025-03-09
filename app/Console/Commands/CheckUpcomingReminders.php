<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reminder;
use App\Notifications\ReminderDueNotification;

class CheckUpcomingReminders extends Command
{
    protected $signature = 'reminders:check';

    public function handle() {
        $reminders = Reminder::where('date', '<', now()->addDay())->get();

        foreach ($reminders as $reminder) {
            $reminder->user->notify(new ReminderDueNotification($reminder));
        }

        $this->info('Recordatorio por correo enviado.');
    }
}

