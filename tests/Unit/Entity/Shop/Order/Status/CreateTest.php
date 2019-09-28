<?php

namespace Tests\Unit\Entity\Shop\Order\Status;

use App\Entity\Shop\Order\Order;
use App\Entity\Shop\Order\Status;
use App\Entity\User\User;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testNew(): void
    {
        $user = factory(User::class)->make([
            'id' => 1,
            'status' => User::STATUS_ACTIVE,
            'verify_token' => null
        ]);

        $order = Order::new(
            $userId = $user->id,
            $note = 'Note',
            $cost = 500
        );

        $status = Status::new(
            $orderId = $order->id,
            $value = Status::NEW
        );

        $this->assertEquals($status->value, $value);
        $this->assertNotEmpty($status->created_at);
        $this->assertNotEmpty($status->updated_at);
    }
}