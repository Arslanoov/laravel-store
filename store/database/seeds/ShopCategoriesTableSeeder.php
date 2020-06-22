<?php

use App\Entity\Shop\Category;
use Illuminate\Database\Seeder;

class ShopCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Category::class, 25)->create();
    }
}