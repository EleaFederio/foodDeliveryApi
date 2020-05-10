<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use App\Seller;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'foodPicture' => $faker->word,
        'seller_id' => function(){
            return Seller::all()->random();
        },
        'category_id' => function(){
            return Category::all()->random();
        },
        'price' => $faker->randomDigit(10, 70),
//        'price' => $faker->randomDigit(0.0, 10000.00),
        'stock' => $faker->randomDigit(100, 100),
    ];
});
