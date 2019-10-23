<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name,
        'product_breif_description' => $faker->sentence(),
        'product_long_description' => $faker->paragraph(),
        'product_code' => "IR:" . $faker->randomNumber(4, true),
        'product_price' => $faker->randomFloat(2, 1, 100),
        'product_stock' => $faker->numberBetween(0, 50),
        'product_image' => 'default_product.jpg',
        'additional_info' => $faker->text(200),
    ];
});
