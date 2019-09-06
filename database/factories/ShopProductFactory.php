<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Entity\Shop\Product\Product;
use App\Entity\Shop\Brand;

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

$factory->define(Product::class, function (Faker $faker) use ($factory) {
    $brand = $factory->make(Brand::class, [
        'id' => 1
    ]);

    return [
        'category_id' => null,
        'brand_id' => $brand->id,
        'availability' => $faker->randomElement([
            Product::AVAILABILITY_OUT_OF_STOCK,
            Product::AVAILABILITY_IN_STOCK
        ]),
        'title' => $faker->title,
        'slug' => $faker->slug,
        'price' => $faker->randomNumber(),
        'content' => $faker->text,
        'status' => Product::STATUS_DRAFT,
        'comments' => 0,
        'reviews' => 0
    ];
});
