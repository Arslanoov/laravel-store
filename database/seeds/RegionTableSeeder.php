<?php

use App\Entity\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Region::class, 25)->create();
    }
}