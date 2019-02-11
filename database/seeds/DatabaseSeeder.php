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
        // $this->call(UsersTableSeeder::class);
        factory(Ad::class, 5)->create();

        collect(include(database_path('seeds/addresses.php')))->each(function ($address, $index) {
            Ad::find($index+1)->update([
                'address' => $address
            ]);
        });
    }
}
