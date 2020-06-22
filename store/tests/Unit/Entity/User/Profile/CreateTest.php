<?php

namespace Tests\Unit\Entity\User\Profile;

use App\Entity\Region;
use App\Entity\User\Profile;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $user = factory(User::class)->make([
            'id' => 1,
            'verify_token' => null,
            'status' => User::STATUS_ACTIVE
        ]);

        $profile = Profile::new(
            $userId = $user->id,
            $surname = 'Surname',
            $patronymic = 'Patronymic',
            $phone = '79123456789',
            $code = 111111
        );

        $this->assertEquals($profile->user_id, $userId);
        $this->assertEquals($profile->surname, $surname);
        $this->assertEquals($profile->patronymic, $patronymic);
        $this->assertEquals($profile->phone, $phone);
        $this->assertEquals($profile->code, $code);
    }
}