<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;


class UserResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * The token used to reset the password.
     *
     * @var string
     */
    private $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $user = app('App\\Repositories\\Contracts\\UserRepository')->find($notifiable->id);

        return (new MailMessage)
                    ->markdown('mails.reset-password', ['locale' => app()->getLocale()])
                    ->from('info@'.parse_url(env('APP_URL'))['host'])
                    ->subject(trans('mails.password_reset_subject', [], app()->getLocale()))
                    ->line(trans('mails.password_reset_first_line', [], app()->getLocale()))
                    ->action(trans('mails.password_reset_action', [], app()->getLocale()), route('password.reset', ['token' => $this->token]))
                    ->line(trans('mails.password_reset_last_line', [], app()->getLocale()));
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
