<?php

namespace Tests\Unit\Entity\Shop\Product\Photo;

use App\Entity\Shop\Product\Photo;
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

        $photo = Photo::new(
            $productId = $product->id,
            $photoFile = 'photo.png'
        );

        $this->assertEquals($photo->product_id, $productId);
        $this->assertEquals($photo->photo, $photoFile);
    }
}