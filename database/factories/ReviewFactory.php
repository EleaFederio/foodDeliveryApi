<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\Food;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'food_id' => function(){
            return Food::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        },
        'star' => $faker->randomDigit(1, 5),
        'review' => $faker->paragraph,
    ];
});
