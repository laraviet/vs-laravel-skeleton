<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Product\Entities\ProductTag;

$factory->define(ProductTag::class, function (Faker $faker) {
    return [
        'name'   => $faker->words(3, true),
        'status' => $faker->numberBetween(0, 1),
    ];
});
