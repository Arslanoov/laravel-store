<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Entity\Shop\Product\Product;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => null,
        'availability' => $faker->randomElement([
            Product::AVAILABILITY_IN_STOCK,
            Product::AVAILABILITY_OUT_OF_STOCK
        ]),
        'title' => $faker->title,
        'slug' => $faker->slug,
        'price' => $faker->randomNumber(),
        'description' => $faker->text
    ];
});
