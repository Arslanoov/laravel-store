<?php

namespace Tests\Unit\Entity\Shop\Comment;

use App\Entity\Shop\Comment;
use App\Entity\Shop\Product\Product;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $user = factory(User::class)->make([
            'id' => 1,
            'status' => User::STATUS_ACTIVE,
            'verify_token' => null,
        ]);

        $product = factory(Product::class)->make([
            'id' => 1
        ]);

        $comment = Comment::new(
            $user->id,
            $product->id,
            null,
            $text = 'Text'
        );

        $this->assertEquals($comment->author_id, $user->id);
        $this->assertEquals($comment->product_id, $product->id);
        $this->assertEmpty($comment->parent_id);
        $this->assertEquals($comment->text, $text);
    }
}