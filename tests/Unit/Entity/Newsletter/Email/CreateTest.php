<?php

namespace Tests\Unit\Entity\Newsletter\Email;

use App\Entity\Newsletter\Email;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testNew(): void
    {
        $item = Email::new(
            $email = 'example@test.com'
        );
        
        $this->assertEquals($item->email, $email);
    }
}