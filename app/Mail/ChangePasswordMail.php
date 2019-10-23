<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangePasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user_name_to_send = "";

    public function __construct($user_name)
    {
        $this->user_name_to_send = $user_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.changepassword', [
            'user_name' => $this->user_name_to_send,
        ])->subject('My Custom Subject: Password Change Notification ')
        ;
    }
}
