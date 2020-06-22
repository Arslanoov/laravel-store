<?php

namespace App\Command\Auth\Verify;

use App\Entity\User\User;

class Command
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}