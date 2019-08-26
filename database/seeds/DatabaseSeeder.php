<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BlogTagsTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
    }
}
