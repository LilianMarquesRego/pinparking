<?php

use Faker\Generator as Faker;
use App\Ad;
use App\User;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'owner_id' => factory(User::class),
        'description' => $faker->paragraph,
        'address' => $faker->address,
        'price' => $faker->numberBetween(5, 20),
        'image' => 'parking_space.jpg',
    ];
});
