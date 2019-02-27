<?php

use Illuminate\Database\Seeder;
use App\Ad;
use App\Json;
use App\User;
use Faker\Generator as Faker;
use App\Transaction;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create();
        
        $handle = fopen(__DIR__ . "/addresses.txt", "r");
        
        $id = 1;
        
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                factory(Ad::class)->create([
                    'owner_id' => $id++,
                    'address' => trim($buffer),
                    'image' => $id % 5 . '.png',
                ]);
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }
        
        $users = User::all();
        
        $ads = Ad::all();
        
        for ($i = 0; $i < 500; $i++) {
            $user = $users->random();
            
            $user->ads()->attach($ads->random(), ['created_at' => now()->subMinutes(rand(0, 60*24*365))]);
        }
    }
}
