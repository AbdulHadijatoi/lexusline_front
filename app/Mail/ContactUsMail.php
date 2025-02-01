<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $messageBody;

    public function __construct($email, $messageBody)
    {
        $this->email = $email;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->subject('New Contact Request')
                    ->markdown('emails.contactus');
    }
}
