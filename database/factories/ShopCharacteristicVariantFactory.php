<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Entity\Shop\Characteristic\Variant;
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

$factory->define(Variant::class, function (Faker $faker) {

    $characteristic = factory(Characteristic::class)->create();

    return [
        'characteristic_id' => $characteristic->id,
        'name' => $faker->name
    ];
});
