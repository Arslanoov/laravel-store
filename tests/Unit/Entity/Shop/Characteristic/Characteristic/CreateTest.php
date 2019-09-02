<?php

namespace Tests\Unit\Entity\Shop\Characteristic\Characteristic;

use App\Entity\Shop\Characteristic\Characteristic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $char = Characteristic::new(
            $name = 'Name',
            $type = Characteristic::TYPE_INTEGER,
            $required = true,
            $default = 0,
            $sort = 20
        );

        $this->assertEquals($char->name, $name);
        $this->assertEquals($char->type, $type);
        $this->assertEquals($char->required, $required);
        $this->assertEquals($char->default, $default);
        $this->assertEquals($char->sort, $sort);
    }
}