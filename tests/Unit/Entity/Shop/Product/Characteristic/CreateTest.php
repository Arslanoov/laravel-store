<?php

namespace Tests\Unit\Entity\Shop\Product\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Entity\Shop\Product\Characteristic as ProductCharacteristics;
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

        $characteristic = factory(Characteristic::class)->make([
            'id' => 1
        ]);

        $productCharacteristic = ProductCharacteristics::new(
            $productId = $product->id,
            $characteristicId = $characteristic->id
        );

        $this->assertEquals($productCharacteristic->product_id, $productId);
        $this->assertEquals($productCharacteristic->characteristic_id, $characteristicId);
    }
}