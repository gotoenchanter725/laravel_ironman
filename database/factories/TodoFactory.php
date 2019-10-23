<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'taskName' => $faker->sentence,
        'taskDescription' => $faker->text(50),
        'user_id' => $faker->numberBetween(1, 10),
        'taskStatus' => $faker->numberBetween(0, 1),
        'created_at' => $faker->dateTime,
        'updated_at' => null,
    ];
});
