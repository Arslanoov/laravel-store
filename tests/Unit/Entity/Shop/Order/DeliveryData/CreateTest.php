<?php

namespace Tests\Unit\Entity\Shop\Order\DeliveryData;

use App\Entity\Region;
use App\Entity\Shop\Order\DeliveryData;
use App\Entity\Shop\Order\Order;
use App\Entity\Shop\Order\Status;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew()
    {
        $user = factory(User::class)->make([
            'id' => 1,
            'status' => User::STATUS_ACTIVE,
            'verify_token' => null
        ]);

        $region = factory(Region::class)->make([
            'id' => 1
        ]);

        $order = Order::new(
            $userId = $user->id,
            $paymentMethod = 'QIWI',
            $cost = 500,
            $currentStatus = Status::NEW,
            $cancelReason = null
        );

        $deliveryData = DeliveryData::new(
            $userId = $user->id,
            $orderId = $order->id,
            $regionId = $region->id,
            $code = 400000
        );

        $this->assertEquals($deliveryData->regionId, $regionId);
        $this->assertEquals($deliveryData->code, $code);
    }
}