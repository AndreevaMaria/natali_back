<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrdersFabric;
use Faker\Generator as Faker;

$factory->define(OrdersFabric::class, function (Faker $faker) {
    return [
        'idOrder' =>  $faker->randomDigit + 1,
        'idOrdersFabric' =>  $faker->numberBetween($min = 1, $max = 50),
        'Notice' => $faker->catchPhrase,
        'Amount' => $faker->randomNumber(2),
    ];
});
