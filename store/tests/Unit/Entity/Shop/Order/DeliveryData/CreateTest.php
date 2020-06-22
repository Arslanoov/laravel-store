<?php

namespace Tests\Unit\Entity\Shop\Order\DeliveryData;

use App\Entity\Region;
use App\Entity\Shop\Order\DeliveryData;
use App\Entity\Shop\Order\Order;
use App\Entity\Shop\Order\Status;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew()
    {
        $region = factory(Region::class)->make([
            'id' => 1
        ]);

        $deliveryData = DeliveryData::new(
            $regionId = $region->id,
            $code = 400000
        );

        $this->assertEquals($deliveryData->region_id, $regionId);
        $this->assertEquals($deliveryData->code, $code);
    }
}