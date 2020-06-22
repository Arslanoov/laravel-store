<?php

namespace App\Command\Admin\User\Verify;

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
        $this->users->verify($command->user);
    }
}