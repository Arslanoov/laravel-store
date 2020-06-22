<?php

namespace App\Command\Admin\User\Role;

use App\Entity\User\User;

class Command
{
    public $role;

    public $user;

    public function __construct(User $user, string $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
}