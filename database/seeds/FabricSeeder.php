<?php
namespace Database\Seeders;

use App\Fabric;
use Illuminate\Database\Seeder;

class FabricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fabric::class, 50)->create();
    }
}
