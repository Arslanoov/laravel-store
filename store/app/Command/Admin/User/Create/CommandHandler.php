<?php

namespace App\Command\Admin\User\Create;

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
        $this->users->create(
            $command->username,
            $command->email,
            $command->password
        );
    }
}