<?php

use Faker\Generator as Faker;
use App\Owner;

$factory->define(App\Ad::class, function (Faker $faker) {
    return [
        'owner_id' => factory(Owner::class),
        'description' => $faker->paragraph,
        'address' => $faker->address,
        'price' => $faker->numberBetween(5, 20),
    ];
});
