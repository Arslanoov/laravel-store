<?php

use Faker\Generator as Faker;
use App\Entity\Blog\Category;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->boolean;
    $description = $faker->boolean;

    return [
        'parent_id' => null,
        'name' => $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'title' => $title ? $faker->title : null,
        'description' => $description ? $faker->text : null
    ];
});