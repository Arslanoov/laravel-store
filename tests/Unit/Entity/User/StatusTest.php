<?php

namespace Tests\Unit\Entity\User;

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
        $user = User::new(
            $name = 'name',
            $email = 'email'
        );

        $this->assertTrue($user->isActive());
        $this->assertFalse($user->isWait());

        $user->draft();

        $this->assertTrue($user->isWait());
        $this->assertFalse($user->isActive());
    }

    public function testAlreadyActivated(): void
    {
        $user = User::register(
            $name = 'name',
            $email = 'email',
            $password = 'password'
        );

        $this->expectExceptionMessage('User is already activated.');

        $user->verify();
    }

    public function testAlreadyDrafted(): void
    {
        $user = User::new(
            $name = 'name',
            $email = 'email'
        );

        $this->expectExceptionMessage('User is already drafted.');

        $user->draft();
    }
}