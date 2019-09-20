<?php

namespace App\ReadRepository\User;

use App\Entity\User\Profile;

class ProfileReadRepository
{
    public function findByUserId(int $userId): ?Profile
    {
        $profile = Profile::where('user_id', $userId)->first();
        return $profile;
    }
}