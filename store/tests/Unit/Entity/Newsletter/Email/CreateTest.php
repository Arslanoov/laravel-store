<?php

namespace Tests\Unit\Entity\Newsletter\Email;

use App\Entity\Newsletter\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $item = Email::new(
            $email = 'example@test.com'
        );
        
        $this->assertEquals($item->email, $email);
    }
}