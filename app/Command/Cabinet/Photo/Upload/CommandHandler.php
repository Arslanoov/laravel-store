<?php

namespace App\Command\Cabinet\Photo\Upload;

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
        $this->users->addPhoto($command->user, $command->file);
    }
}