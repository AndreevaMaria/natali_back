<?php
namespace Database\Seeders;

use App\User;
use App\Order;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        /**factory(User::class, 10)
           ->create()
           ->each(function ($user) {
                $user->createMany(
                    factory(Order::class, 3)
                    ->make()
                    ->toArray()
                );
            });**/
    }
}
