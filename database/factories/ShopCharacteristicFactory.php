<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Entity\Shop\Characteristic\Characteristic;

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

$factory->define(Characteristic::class, function (Faker $faker) {
    $isRequired = $faker->boolean;

    return [
        'name' => $faker->name,
        'type' => $faker->randomElement([
            Characteristic::TYPE_INTEGER,
            Characteristic::TYPE_FLOAT,
            Characteristic::TYPE_STRING
        ]),
        'required' => $isRequired,
        'default' => 0,
        'sort' => 10
    ];
});
