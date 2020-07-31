<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Product\Entities\ProductCategory;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'status'     => $faker->numberBetween(0, 1),
        'is_feature' => $faker->numberBetween(0, 1),
        'vi'         => [
            'name'        => $faker->words(3, true),
            'description' => $faker->sentence,
        ],
        'en'         => [
            'name'        => $faker->words(3, true),
            'description' => $faker->sentence,
        ]
    ];
});
