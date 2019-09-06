<?php

namespace Tests\Unit\Entity\Shop\Product\Product;

use App\Entity\Shop\Product\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $product = Product::new(
            $categoryId = 3,
            $availability = Product::AVAILABILITY_IN_STOCK,
            $title = 'Title',
            $slug = 'slug',
            $price = 300,
            $description = 'Description'
        );

        $this->assertEquals($product->category_id, $categoryId);
        $this->assertEquals($product->availability, $availability);
        $this->assertEquals($product->title, $title);
        $this->assertEquals($product->slug, $slug);
        $this->assertEquals($product->price, $price);
        $this->assertEquals($product->description, $description);
    }
}