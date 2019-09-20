<?php

namespace Tests\Unit\Entity\User\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Entity\User\User;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function testChangeToAdminFromUser(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_USER
        ]);

        $this->assertTrue($user->isUser());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isAdmin());

        $user->changeRole(User::ROLE_ADMIN);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isUser());
        $this->assertFalse($user->isManager());
    }

    public function testChangeToManagerFromUser(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_USER
        ]);

        $this->assertTrue($user->isUser());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isAdmin());

        $user->changeRole(User::ROLE_MANAGER);

        $this->assertTrue($user->isManager());
        $this->assertFalse($user->isAdmin());
        $this->assertFalse($user->isUser());
    }

    public function testChangeToAdminFromManager(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_MANAGER
        ]);

        $this->assertTrue($user->isManager());
        $this->assertFalse($user->isUser());
        $this->assertFalse($user->isAdmin());

        $user->changeRole(User::ROLE_ADMIN);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isUser());
    }

    public function testChangeToManagerFromAdmin(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_ADMIN
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isUser());

        $user->changeRole(User::ROLE_MANAGER);

        $this->assertTrue($user->isManager());
        $this->assertFalse($user->isAdmin());
        $this->assertFalse($user->isUser());
    }

    public function testChangeToUserFromAdmin(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_ADMIN
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isUser());

        $user->changeRole(User::ROLE_USER);

        $this->assertTrue($user->isUser());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isAdmin());
    }

    public function testAlreadyChangedUser(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_USER
        ]);

        $this->expectExceptionMessage('Role is already assigned.');

        $user->changeRole(User::ROLE_USER);
    }

    public function testAlreadyChangedManager(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_MANAGER
        ]);

        $this->expectExceptionMessage('Role is already assigned.');

        $user->changeRole(User::ROLE_MANAGER);
    }

    public function testAlreadyChangedAdmin(): void
    {
        $user = factory(User::class)->create([
            'role' => User::ROLE_ADMIN
        ]);

        $this->expectExceptionMessage('Role is already assigned.');

        $user->changeRole(User::ROLE_ADMIN);
    }
}