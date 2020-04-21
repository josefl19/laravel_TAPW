<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\About;
use Faker\Generator as Faker;

$factory->define(About::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'puesto' => $faker->randomElement(['CEO', 'Secretary', 'Admin', 'President', 'Vicepresident']),
        'image' => $faker->randomElement(['team1.jpg', 'team3.jpg', 'team4.jpg', 'team5.jpg', 'team6.jpg', 'team2.jpg']),
    ];
});
