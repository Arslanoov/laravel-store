<?php

namespace Tests\Unit\Entity\Shop\Product;

use App\Entity\Shop\Brand;
use App\Entity\Shop\Category;
use App\Entity\Shop\Product\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $brand = factory(Brand::class)->make([
            'id' => 1
        ]);

        $category = factory(Category::class)->make([
            'id' => 1
        ]);

        $product = Product::new(
            $categoryId = $category->id,
            $brandId = $brand->id,
            $title = 'Title',
            $slug = 'slug',
            $price = 300,
            $content = 'Content'
        );

        $this->assertEquals($product->category_id, $categoryId);
        $this->assertEquals($product->brand_id, $brandId);
        $this->assertEquals($product->title, $title);
        $this->assertEquals($product->slug, $slug);
        $this->assertEquals($product->price, $price);
        $this->assertEquals($product->content, $content);
        $this->assertEquals($product->availability, Product::AVAILABILITY_OUT_OF_STOCK);
        $this->assertEquals($product->comments, 0);
        $this->assertEquals($product->reviews, 0);
    }
}