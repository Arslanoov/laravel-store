<?php

namespace App\ReadRepository\User;

use App\Entity\User\User;

class UserReadRepository
{
    public function find(string $id): ?User
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function findByToken(string $token): ?User
    {
        $user = User::where('verify_token', $token)->first();
        return $user;
    }

    public function findByEmail(string $email): ?User
    {
        $user = User::where('email', $email)->first();
        return $user;
    }
}