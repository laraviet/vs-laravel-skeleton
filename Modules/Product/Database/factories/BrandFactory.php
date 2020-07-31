<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Product\Entities\Brand;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'       => $faker->words(3, true),
        'is_feature' => $faker->numberBetween(0, 1),
        'status'     => $faker->numberBetween(0, 1),
    ];
});
