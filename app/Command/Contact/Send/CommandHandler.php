<?php

namespace App\Command\Contact\Send;

use App\Mail\Contact\SendMail;
use Illuminate\Contracts\Mail\Mailer;

class CommandHandler
{
    private $mailer;

    public function __construct(Mailer $mailer, string $toEmail)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(Command $command)
    {
        $this->mailer->to(env('ADMIN_EMAIL'))->send(
            new SendMail(
                $command->name,
                $command->email,
                $command->message
            )
        );
    }
}
