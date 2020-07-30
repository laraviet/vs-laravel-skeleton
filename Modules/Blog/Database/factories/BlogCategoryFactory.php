<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Blog\Entities\BlogCategory;

$factory->define(BlogCategory::class, function (Faker $faker) {
    return [
        'parent_id' => $faker->randomNumber(1),
        'status'    => $faker->numberBetween(0, 1),
        'vi'        => [
            'name' => $faker->word,
        ],
        'en'        => [
            'name' => $faker->word,
        ]
    ];
});
