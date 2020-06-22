<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BlogTagsTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ShopBrandsTableSeeder::class);
        $this->call(ShopCategoriesTableSeeder::class);
        $this->call(ShopProductsTableSeeder::class);
        $this->call(RegionTableSeeder::class);
    }
}
