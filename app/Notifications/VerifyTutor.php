<?php

namespace Studihub\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyTutor extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $token;
    private $tutor;

    public function __construct($token, $tutor)
    {
        $this->token = $token;
        $this->tutor = $tutor;
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
            ->greeting('You are welcome!')
            ->line('We are so happy you joined us! You have successfully signed up for a '.config('app.name').'com Student Hub')
            ->line('You are one step away from being part of us and giving lives meaning, You need to verify your email address and activate your account by clicking the button below')
            ->action('Click on this link to verify your account', url(config('app.url').route('tutor.verify', 'email='.$this->tutor->email.'&code='.$this->token, false)))
            ->line('Thank you for signing up!.')
            ->line('If you did not create any account with us, no further action is required.');
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
