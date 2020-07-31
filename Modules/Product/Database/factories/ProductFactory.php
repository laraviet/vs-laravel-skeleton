<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Product\Entities\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku'           => $faker->words(3, true),
        'regular_price' => $faker->numberBetween(500000, 1000000),
        'sale_price'    => $faker->numberBetween(100000, 400000),
        'quantity'      => $faker->numberBetween(1, 10),
        'status'        => $faker->numberBetween(0, 1),
        'vi'            => [
            'name'        => $faker->words(3, true),
            'caption'     => $faker->words(3, true),
            'description' => $faker->sentence
        ],
        'en'            => [
            'name'        => $faker->words(3, true),
            'caption'     => $faker->words(3, true),
            'description' => $faker->sentence
        ]
    ];
});
