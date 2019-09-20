<?php

namespace App\Command\Cabinet\Profile\Fill;

use App\Repository\User\ProfileRepository;

class CommandHandler
{
    private $profiles;

    public function __construct(ProfileRepository $profiles)
    {
        $this->profiles = $profiles;
    }

    public function __invoke(Command $command)
    {
        $this->profiles->update(
            $command->profile,
            $command->surname,
            $command->patronymic,
            $command->phone,
            $command->code
        );
    }
}