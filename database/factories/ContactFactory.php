<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email_address' => $faker->unique()->safeEmail,
        'mobile_number' => $faker->phoneNumber,
        'city' => $faker->city,
        'created_at' => $faker->dateTime($max = 'now', 'Asia/Dhaka'),
        'updated_at' => null,
    ];
});
