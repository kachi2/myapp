<?php

namespace App\Notifications;

use App\Models\DepositTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DepositPaid extends Notification
{
    use Queueable;

    public $depositTransaction;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(DepositTransaction $depositTransaction)
    {
        $this->depositTransaction = $depositTransaction;
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
                    ->subject('DEP0S|T Successful #'.$this->trade->ref)
                    ->from('support@nixoncapital.cc', 'Nixoncapital')
                    ->view('emails.deposit-created', ['deposit' => $this->trade]);
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
