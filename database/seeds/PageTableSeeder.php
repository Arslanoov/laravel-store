<?php

use App\Entity\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Page::class, 25)->create();
    }
}