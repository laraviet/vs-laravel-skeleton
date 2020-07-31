<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Blog\Entities\BlogTag;

$factory->define(BlogTag::class, function (Faker $faker) {
    return [
        'name'   => $faker->words(3, true),
        'status' => $faker->numberBetween(0, 1)
    ];
});
