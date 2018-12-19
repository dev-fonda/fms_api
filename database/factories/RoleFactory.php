<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        //
        'code' => $faker->text(6),
        'description' => $faker->text(10),
    ];
});
