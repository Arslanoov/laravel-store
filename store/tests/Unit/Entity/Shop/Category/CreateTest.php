<?php

namespace Tests\Unit\Entity\Shop\Category;

use App\Entity\Blog\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew()
    {
        $category = Category::new(
            $parent = null,
            $name = 'name',
            $slug = 'slug',
            $title = 'title',
            $description = 'description'
        );

        $this->assertEquals($category->parent, $parent);
        $this->assertEquals($category->name, $name);
        $this->assertEquals($category->slug, $slug);
        $this->assertEquals($category->title, $title);
        $this->assertEquals($category->description, $description);
    }
}