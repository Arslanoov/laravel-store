<?php

use Illuminate\Database\Seeder;
use App\Entity\Shop\Brand;

class ShopBrandsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Brand::class, 25)->create();
    }
}