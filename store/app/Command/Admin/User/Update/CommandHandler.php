<?php

namespace App\Command\Admin\User\Update;

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
        $this->users->update(
            $command->user, 
            $command->username,
            $command->email
        );
    }
}