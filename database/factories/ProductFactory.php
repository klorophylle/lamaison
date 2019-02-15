<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9999),
        'size' => $faker->numberBetween($min = 1, $max = 4),
        'url_image' => $faker->imageUrl($width = 200, $height = 200, 'fashion'),
        'status' => $faker->randomElement($array = array ('published','draft')),
        'code' => $faker->randomElement($array = array ('new','sale')),
        'reference' => $faker->ean8()
    ];
});