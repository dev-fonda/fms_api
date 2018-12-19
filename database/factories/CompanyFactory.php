<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        //
        'code' => strtoupper($faker->text(5)),
        'name' => $faker->text(50),
        'corp_ofc_location' => $faker->text(250),
        'corp_ofc_address' => $faker->text(250),
        'comm_ofc_location' => $faker->text(250),
        'comm_ofc_address' => $faker->text(250),
        'status' => $faker->text(50)
    ];
});
