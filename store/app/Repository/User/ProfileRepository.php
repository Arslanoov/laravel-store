<?php

namespace App\Repository\User;

use App\Entity\User\Profile;

class ProfileRepository
{
    public function blank(int $userId): Profile 
    {
        $blankProfile = Profile::blank($userId);
        return $blankProfile;
    }
    
    public function create(
        $userId,
        $surname, $patronymic,
        $phone, $code
    ): Profile
    {
        $profile = Profile::new(
            $userId,
            $surname, $patronymic,
            $phone, $code
        );

        return $profile;
    }

    public function update(
        Profile $profile,
        $surname, $patronymic,
        $phone, $code
    ): void 
    {
        $profile->update([
            'surname' => $surname,
            'patronymic' => $patronymic,
            'phone' => $phone,
            'code' => $code
        ]);
    }
}