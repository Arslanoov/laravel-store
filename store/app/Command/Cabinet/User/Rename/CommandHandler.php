<?php

namespace App\Command\Cabinet\User\Rename;

use App\Repository\User\UserRepository;

class CommandHandler
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(Command $command)
    {
        $this->users->rename($command->user, $command->name);
    }
}