<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailVerificationNotification extends VerifyEmail
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $prefix =  env('FRONTEND_APP_URL') . '/verify-email?url=';
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)->from(env('MAIL_FROM_ADDRESS'), 'MyStore')
            ->subject('Подтверждение email')
            ->line('Нажмите на кнопку ниже, чтобы подтвердить Ваш email')
            ->action('Подтвердить email адрес',$prefix . url($verificationUrl))
            ->line('Спасибо!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
