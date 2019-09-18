<?php

namespace Tests\Unit\Entity\Shop\DeliveryMethod;

use App\Entity\Shop\DeliveryMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $deliveryMethod = DeliveryMethod::new(
            $name = 'Name',
            $cost = 500,
            $minWeight = 200,
            $maxWeight = 300,
            $sort = 0
        );

        $this->assertEquals($deliveryMethod->name, $name);
        $this->assertEquals($deliveryMethod->cost, $cost);
        $this->assertEquals($deliveryMethod->min_weight, $minWeight);
        $this->assertEquals($deliveryMethod->max_weight, $maxWeight);
        $this->assertEquals($deliveryMethod->sort, $sort);
    }
}