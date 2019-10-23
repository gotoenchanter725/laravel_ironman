<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostComment;
use Faker\Generator as Faker;

$factory->define(PostComment::class, function (Faker $faker) {
    return [
        'commenter_message' => $faker->paragraph(),
        'created_at' => $faker->dateTime($max = 'now', 'Asia/Dhaka'),
        'updated_at' => null,
    ];
});
