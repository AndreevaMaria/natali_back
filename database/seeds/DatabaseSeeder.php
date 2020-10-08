<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            'Database\Seeders\UserSeeder',
            'Database\Seeders\FabricsTypeSeeder',
            'Database\Seeders\FabricSeeder',
            'Database\Seeders\PhotoSeeder',
            'Database\Seeders\OrderSeeder'
        ]);
    }
}
