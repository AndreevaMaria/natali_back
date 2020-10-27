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
use App\Photo;
use App\Fabric;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'idFabric' => $faker->numberBetween($min = 1, $max = 50),
        'Imagepath' => $faker->imageUrl($width = 640, $height = 480),
        'ImageNotice' => $faker->catchPhrase,
    ];
});
