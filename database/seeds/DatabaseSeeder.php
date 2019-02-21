<?php

use Illuminate\Database\Seeder;
use App\Ad;
use App\Json;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Ad::class, 5)->create();

        collect(include(database_path('seeds/addresses.php')))->each(function ($address, $index) {
            Ad::find($index+1)->update([
                'address' => $address[0],
                'latitude' => $address[1],
                'longitude' => $address[2],
            ]);
        });
    }
}
