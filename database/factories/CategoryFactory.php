<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'categoryName' => $faker->unique()->name,
        'categoryDescription' => $faker->text($maxNbChars = 20),
        'user_id' => $faker->numberBetween(1, 10),
        'created_at' => $faker->dateTime($max = 'now', 'Asia/Dhaka'),
        'updated_at' => null,
    ];
});
