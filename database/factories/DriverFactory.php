<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'middleName' => $faker->lastName,
        'profilePicture' => $faker->word,
        'email' => $faker->email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'phoneNumber' => $faker->phoneNumber,
        'address' => $faker->address,
        'long' => $faker->longitude,
        'lat' => $faker->latitude
    ];
});
