<?php

use App\Entity\Shop\Product\Product;
use Illuminate\Database\Seeder;

class ShopProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Product::class, 25)->create();
    }
}