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
use App\Order;
use App\User;
use App\Fabric;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'idUser' =>  $faker->randomDigit + 1,
            //find($post['user_id'])->type;
            //factory(App\User::class),
        'idFabric' =>  $faker->numberBetween($min = 1, $max = 50),
        'OrderNum' => $faker->regexify('[1-9]{2}'),
        'OrderDate' => $faker->dateTimeBetween($startDate = '- 2 month', $endDate = 'now', $timezone = null)->format('Y-m-d'),
        'Amount' => $faker->randomNumber(2),
        'FinalDate' => $faker->dateTimeBetween($startDate = '+ 5 days', $endDate = '+ 15 days', $timezone = null)->format('Y-m-d'),
        'OrderStatus' => $faker->randomElement($array = array ('Создан', 'Оформлен', 'Оплачен', 'В пути', 'Получен'))
    ];
});
