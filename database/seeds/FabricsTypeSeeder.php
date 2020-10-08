<?php
namespace Database\Seeders;

use App\FabricsType;
use App\Fabric;
use App\Photo;
use Illuminate\Database\Seeder;

class FabricsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FabricsType::class, 10)->create();
           /**->each(function ($fabricstype) {
                $fabricstype->FabricsList()->createMany(
                    factory(Fabric::class, 5)
                    ->make()
                    ->toArray()
                    ->each(function ($fabric) {
                        $fabric->PhotoList()->createMany(
                            factory(Photo::class, 3)
                            ->make()
                            ->toArray()
                        );
                    })
                );
            });**/
    }
}
