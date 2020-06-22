<?php

namespace Tests\Unit\Entity\User\ComparisonItem;

use App\Entity\Shop\Product\Product;
use App\Entity\User\ComparisonItem;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $user = factory(User::class)->make([
            'id' => 1
        ]);

        $product = factory(Product::class)->make([
            'id' => 1
        ]);

        $item = ComparisonItem::new(
            $userId = $user->id,
            $productId = $product->id
        );

        $this->assertEquals($item->user_id, $userId);
        $this->assertEquals($item->product_id, $productId);
    }
}