<?php

namespace App\Command\Admin\User\Role;

use App\Repository\User\UserRepository;

class CommandHandler
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function __invoke(Command $command): void
    {
        $command->user->changeRole($command->role);
    }
}