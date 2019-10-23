<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use App\User;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'user_id' => $faker->numberBetween(1, User::count()),
        'created_at' => $faker->dateTimeBetween('-3 months'),
        'updated_at' => null,
    ];
});
