<?php

namespace Tests\Unit\Entity\Shop\Order\OrderItem;

use App\Entity\Shop\Order\OrderItem;
use App\Entity\Shop\Product\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $product = factory(Product::class)->make([
            'id' => 1
        ]);

        $orderItem = OrderItem::new(
            $orderId = 1,
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