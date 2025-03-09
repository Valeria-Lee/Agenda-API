<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReminderDueNotification extends Notification {
    protected $reminder;

    public function __construct($reminder) {
        $this->reminder = $reminder;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
            ->subject('Este es tu recordatorio')
            ->line('Tu recordatorio "' . $this->reminder->name . '"')
            ->line('Date: ' . $this->reminder->date->format('Y-m-d H:i'));
    }

    public function toArray($notifiable)
    {
        return [
            'reminder_id' => $this->reminder->id,
            'reminder_name' => $this->reminder->name,
            'reminder_date' => $this->reminder->date,
        ];
    }
}
