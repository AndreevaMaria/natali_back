<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*use \Illuminate\Database\Eloquent\Factory;*/
use App\Fabric;
use Faker\Generator as Faker;

$factory->define(Fabric::class, function (Faker $faker) {
    return [
        'idFabricsType' => $faker->randomDigit + 1,
        'Title' => $faker->catchPhrase,
        'Articul' => $faker->text(10),
        'Price' => $faker->regexify('[3-9]') * 50,
        'PriceNew' => 0,
        'Decsription' => $faker->text(100),
        'FabricComposition' => $faker->text(10),
        'FabricDensity' => $faker->randomDigitNotNull * 100,
        'FabricWidth' => $faker->regexify('[1-2]') * 90,
        'isOneton' => $faker->boolean($chanceOfGettingTrue = 50),
        'isNew' => $faker->boolean($chanceOfGettingTrue = 30),
        'isAction' => $faker->boolean($chanceOfGettingTrue = 20),
        'isTrend' => $faker->boolean($chanceOfGettingTrue = 30),
        'isAvailable'=> $faker->boolean($chanceOfGettingTrue = 80),
        'FabricImage'=> ""
    ];
});
