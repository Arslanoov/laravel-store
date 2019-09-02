<?php

namespace Tests\Unit\Entity\Shop\Brand;

use App\Entity\Shop\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $brand = Brand::new(
            $name = 'Name',
            $slug = 'slug',
            $description = 'Description'
        );

        $this->assertEquals($brand->name, $name);
        $this->assertEquals($brand->slug, $slug);
        $this->assertEquals($brand->description, $description);
    }
}