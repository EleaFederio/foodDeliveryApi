<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use App\User;
use App\Food;
use App\Driver;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'food_id' => function(){
            return Food::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        },
        'status' => $faker->boolean,
        'driver_id' => function(){
            return Driver::all()->random();
        }
    ];
});
