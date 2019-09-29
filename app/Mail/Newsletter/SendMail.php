<?php

namespace App\Mail\Newsletter;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use SerializesModels;

    public function build()
    {
        return $this->subject('Subject')->text('Some text');
    }
}