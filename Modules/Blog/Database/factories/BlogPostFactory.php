<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use Faker\Generator as Faker;
use Modules\Blog\Entities\BlogPost;
use Modules\Core\Entities\User;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'created_by'   => factory(User::class)->create()->id,
        'published_at' => Carbon::now(),
        'status'       => $faker->numberBetween(0, 1),
        'vi'           => [
            'title'   => $faker->words(3, true),
            'content' => $faker->sentence,
        ],
        'en'           => [
            'title'   => $faker->words(3, true),
            'content' => $faker->sentence,
        ]
    ];
});
