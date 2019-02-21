<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Ad::class, function (Faker $faker) {
    return [
        'owner_id' => factory(User::class),
        'description' => $faker->paragraph,
        'address' => $faker->address,
        'price' => $faker->numberBetween(5, 20),
        'image' => 'parking_space.jpg',
    ];
});
