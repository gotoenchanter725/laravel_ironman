<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'client_name' => $faker->name,
        'client_message' => $faker->sentence(),
        'client_position' => $faker->text(50),
    ];
});
