<?php

namespace Tests\Unit\Entity;

use App\Entity\Region;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function testNew(): void
    {
        $region = Region::new(
            $parentId = null,
            $name = 'Name'
        );

        $this->assertEquals($region->parent_id, $parentId);
        $this->assertEquals($region->name, $name);
    }
}