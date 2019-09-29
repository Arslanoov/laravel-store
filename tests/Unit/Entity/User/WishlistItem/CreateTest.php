<?php

namespace Tests\Unit\Entity\User\WishlistItem;

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
            'id' => 1
        ]);

        $product = factory(Product::class)->make([
            'id' => 1
        ]);
        
        $wishlistItem = WishlistItem::new(
            $userId = $user->id,
            $productId = $product->id
        );

        $this->assertEquals($wishlistItem->user_id, $userId);
        $this->assertEquals($wishlistItem->product_id, $productId);
    }
}