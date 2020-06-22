<?php

use Faker\Generator as Faker;
use App\Entity\Page;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Page::class, function (Faker $faker) {
    return [
        'parent_id' => null,
        'title' => $faker->title,
        'menu_title' => $faker->title,
        'slug' => $faker->unique()->slug(2),
        'description' => $faker->text(),
        'content' => $faker->text
    ];
});