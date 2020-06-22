<?php

namespace Tests\Unit\Entity\Shop\Order\OrderItem;

use App\Entity\Shop\Order\Order;
use App\Entity\Shop\Order\OrderItem;
use App\Entity\Shop\Product\Product;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

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

        $product = factory(Product::class)->make([
            'id' => 1
        ]);

        $orderItem = OrderItem::new(
            $orderId = $order->id,
            $productId = $product->id,
            $productName = 'Product',
            $productPrice = 500,
            $productQuantity = 1
        );

        $this->assertEquals($orderItem->order_id, $orderId);
        $this->assertEquals($orderItem->product_id, $productId);
        $this->assertEquals($orderItem->product_name, $productName);
        $this->assertEquals($orderItem->product_price, $productPrice);
        $this->assertEquals($orderItem->product_quantity, $productQuantity);
    }
}