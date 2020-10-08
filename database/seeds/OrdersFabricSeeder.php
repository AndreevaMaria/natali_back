<?php
namespace Database\Seeders;

use App\OrdersFabric;
use Illuminate\Database\Seeder;

class OrdersFabricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrdersFabric::class, 35)->create();
    }
}
