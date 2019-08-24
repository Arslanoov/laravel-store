<?php

namespace App\Repository\User;

use App\Entity\User\User;

class UserRepository
{
    public function register(string $name, string $email, string $password): User
    {
        $user = User::register(
            $name,
            $email,
            $password
        );

        return $user;
    }
}