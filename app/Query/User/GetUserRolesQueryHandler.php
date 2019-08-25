<?php

namespace App\Query\User;

use App\Entity\User\User;

class GetUserRolesQueryHandler
{
    public function __invoke()
    {
        $roles = User::rolesList();
        return $roles;
    }
}