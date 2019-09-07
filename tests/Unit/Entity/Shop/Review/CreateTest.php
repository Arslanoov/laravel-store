<?php

namespace Tests\Unit\Entity\Shop\Review;

use App\Entity\Shop\Product\Product;
use App\Entity\Shop\Review;
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

        $product = factory(Product::class)->make([
            'id' => 1
        ]);

        $review = Review::new(
            $authorId = $user->id,
            $productId = $product->id,
            $rating = 3,
            $text = 'Text'
        );

        $this->assertEquals($review->author_id, $authorId);
        $this->assertEquals($review->product_id, $productId);
        $this->assertEquals($review->rating, $rating);
        $this->assertEquals($review->text, $text);
    }
}