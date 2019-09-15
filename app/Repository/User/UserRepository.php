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

    public function create(string $name, string $email, string $password): User
    {
        $user = User::newActive(
            $name,
            $email,
            $password
        );

        return $user;
    }
    
    public function update(User $user, string $name, string $email): void 
    {
        $user->update([
            'name' => $name,
            'email' => $email
        ]);
    }

    public function remove(User $user): void
    {
        $user->delete();
    }

    public function verify(User $user): void
    {
        $user->verify();
    }

    public function draft(User $user): void
    {
        $user->draft();
    }

    public function addPhoto(User $user, $photo): void
    {
        $user->photo = $photo->store('users', 'public');
        $user->update();
    }
}