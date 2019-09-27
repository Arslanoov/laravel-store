<?php

namespace Tests\Unit\Entity\Shop\Order\Order;

use App\Entity\Region;
use App\Entity\Shop\DeliveryMethod;
use App\Entity\Shop\Order\CustomerData;
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

        $order = Order::new(
            $userId = $user->id,
            $cost = 500,
            $note = 'Note'
        );

        $deliveryMethod = DeliveryMethod::new(
            $name = 'Free',
            $cost = 0,
            $minWeight = 0,
            $maxWeight = 1000,
            $sort = 0
        );

        $order->setDeliveryMethodInfo($deliveryMethod);

        $customerData = CustomerData::new(
            $orderId = $order->id,
            $userId = $user->id,
            $name = 'Name',
            $surname = 'Surname',
            $patronymic = 'Patronymic',
            $email = 'email@gmail.com',
            $phone = 79123456789
        );

        $order->setCustomerDataInfo($customerData->id);

        $region = factory(Region::class)->make([
            'id' => 1
        ]);

        $deliveryData = DeliveryData::new(
            $userId = $user->id,
            $orderId = $order->id,
            $regionId = $region->id,
            $code = 400000
        );

        $order->setPaymentMethod($paymentMethod = 'QIWI');

        $order->setDeliveryDataInfo($deliveryData->id);

        $this->assertEquals($order->user_id, $userId);
        $this->assertEquals($order->delivery_data_id, $deliveryData->id);
        $this->assertEquals($order->customer_data_id, $customerData->id);
        $this->assertEquals($order->delivery_method_id, $deliveryMethod->id);
        $this->assertEquals($order->delivery_method_name, $deliveryMethod->name);
        $this->assertEquals($order->delivery_cost, $deliveryMethod->cost);
        $this->assertEquals($order->payment_method, $paymentMethod);
        $this->assertEquals($order->current_status, Status::NEW);
        $this->assertEmpty($order->cancel_reason);
    }
}