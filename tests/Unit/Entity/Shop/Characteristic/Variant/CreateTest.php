<?php

namespace Tests\Unit\Entity\Shop\Characteristic\Variant;

use App\Entity\Shop\Characteristic\Characteristic;
use App\Entity\Shop\Characteristic\Variant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $char = factory(Characteristic::class)->make([
            'id' => 1
        ]);

        $variant = Variant::new(
            $char->id,
            $name = 'Name'
        );

        $this->assertEquals($char->id, $variant->characteristic_id);
        $this->assertEquals($name, $variant->name);
    }
}