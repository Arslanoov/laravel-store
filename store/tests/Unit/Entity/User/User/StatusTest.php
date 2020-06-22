<?php

namespace Tests\Unit\Entity\User\User;

use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function testVerify(): void
    {
        $user = User::register(
            $name = 'name',
            $email = 'email',
            $password = 'password'
        );

        $this->assertTrue($user->isWait());
        $this->assertFalse($user->isActive());

        $user->verify();

        $this->assertTrue($user->isActive());
        $this->assertFalse($user->isWait());
    }

    public function testDraft(): void
    {
        $user = User::newActive(
            'name',
            'email',
            'secret'
        );

        $this->assertTrue($user->isActive());
        $this->assertFalse($user->isWait());

        $user->draft();

        $this->assertTrue($user->isWait());
        $this->assertFalse($user->isActive());
    }
}
