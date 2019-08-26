<?php

use App\Entity\Blog\Tag;
use Illuminate\Database\Seeder;

class BlogTagsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Tag::class, 25)->create();
    }
}