<?php
namespace Database\Seeders;

use App\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Photo::class, 100)->create();
    }
}
