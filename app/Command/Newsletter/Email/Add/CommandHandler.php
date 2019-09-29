<?php

namespace App\Command\Newsletter\Email\Add;

use App\Repository\Newsletter\EmailRepository;

class CommandHandler
{
    private $emails;

    public function __construct(EmailRepository $emails)
    {
        $this->emails = $emails;
    }

    public function __invoke(Command $command)
    {
        $this->emails->add($command->email);
    }
}