<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'businessName' => $faker->company,
        'description' => $faker->paragraph,
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'middleName' => $faker->lastName,
        'businessLogo' => $faker->word,
        'profilePicture' => $faker->word,
        'email' => $faker->email,
        'phoneNumber' => $faker->phoneNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'address' => $faker->address,
        'long' => $faker->longitude,
        'lat' => $faker->latitude
    ];
});
