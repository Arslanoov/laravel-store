<?php

namespace App\Mail\Contact;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use SerializesModels;

    public $name;
    public $email;
    public $message;

    public function __construct(string $name, string $email, string $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Message from ' . $this->name)->markdown('emails.contact.send');
    }
}