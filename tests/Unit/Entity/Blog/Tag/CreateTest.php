<?php

namespace Tests\Unit\Entity\Blog\Tag;

use App\Entity\Blog\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $tag = Tag::new(
            $name = 'name',
            $slug = 'slug'
        );

        $this->assertEquals($tag->name, $name);
        $this->assertEquals($tag->slug, $slug);
    }
}