<?php

namespace Tests\Unit\Entity\Shop\Order\CustomerData;

use App\Entity\Shop\Order\CustomerData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $customerData = CustomerData::new(
            $name = 'Name',
            $surname = 'Surname',
            $patronymic = 'Patronymic',
            $email = 'email@gmail.com',
            $phone = 79123456789
        );

        $this->assertEquals($customerData->name, $name);
        $this->assertEquals($customerData->surname, $surname);
        $this->assertEquals($customerData->patronymic, $patronymic);
        $this->assertEquals($customerData->email, $email);
        $this->assertEquals($customerData->phone, $phone);
    }
}