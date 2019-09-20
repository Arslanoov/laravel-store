<?php

use Faker\Generator as Faker;
use App\Entity\Region;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Region::class, function (Faker $faker) {
    return [
        'parent_id' => null,
        'name' => $faker->name
    ];
});