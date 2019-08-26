<?php

namespace Tests\Feature\Auth;

use App\Entity\User\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testForm(): void
    {
        $response = $this->get('/login');
        $response
            ->assertStatus(200)
            ->assertSee('Login');
    }

    public function testErrors(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['email', 'password']);
    }
}