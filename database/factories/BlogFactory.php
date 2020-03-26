<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'created_date' => $faker->date('Y-m-d'),
        'author' => $faker->name,
        'image' => 'slide-'.$faker->randomDigitNotNull.'.jpg',
    ];
});
