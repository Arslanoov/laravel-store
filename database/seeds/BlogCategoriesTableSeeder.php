<?php

use App\Entity\Blog\Category;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Category::class, 25)->create();
    }
}