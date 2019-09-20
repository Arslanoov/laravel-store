<?php

namespace Tests\Unit\Entity\User\User;

use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $user = User::new(
            $name = 'name',
            $email = 'email'
        );

        $this->assertEquals($user->name, $name);
        $this->assertEquals($user->email, $email);

        $this->assertNotEmpty($user->password);
        $this->assertEmpty($user->verify_token);

        $this->assertTrue($user->isActive());
        $this->assertFalse($user->isWait());

        $this->assertTrue($user->isUser());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isAdmin());
    }

    public function testRegister(): void
    {
        $user = User::register(
            $name = 'name',
            $email = 'email',
            $password = 'password'
        );

        $this->assertEquals($user->name, $name);
        $this->assertEquals($user->email, $email);

        $this->assertNotEquals($user->password, $password);

        $this->assertNotEmpty($user->verify_token);
        $this->assertNotEmpty($user->password);

        $this->assertTrue($user->isWait());
        $this->assertFalse($user->isActive());

        $this->assertTrue($user->isUser());
        $this->assertFalse($user->isManager());
        $this->assertFalse($user->isAdmin());
    }
}