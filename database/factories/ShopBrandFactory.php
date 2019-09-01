<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity\Shop\Brand;
use Faker\Generator as Faker;

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

$factory->define(Brand::class, function (Faker $faker) {
    $description = $faker->boolean;

    return [
        'name' => $faker->name,
        'slug' => $faker->unique()->slug(),
        'description' => $description ? $faker->text : null
    ];
});
