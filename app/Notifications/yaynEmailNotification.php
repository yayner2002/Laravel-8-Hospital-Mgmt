<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class yaynEmailNotification extends Notification
{
    use Queueable;
    public $emailAttributes;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($emailAttributes)
    {
        $this->emailAttributes = $emailAttributes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->emailAttributes['greeting'])
                    ->line($this->emailAttributes['body'])
                    ->action($this->emailAttributes['actionText'], $this->emailAttributes['textUrl'])
                    ->line($this->emailAttributes['endPart']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}