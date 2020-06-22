<?php

namespace App\Command\Auth\Verify;

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
        $command->user->verify();
    }
}