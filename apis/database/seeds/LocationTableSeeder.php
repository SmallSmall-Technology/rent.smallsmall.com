<?php

use Illuminate\Database\Seeder;
use App\Location;
use Illuminate\Support\Carbon;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Location::truncate();

        $locations = [
            [
                'name' => 'Agungi',
                'country_id' => 160,
                'state_id' => 2671,
                'city_id' => 48367,
            ],
            [
                'name' => 'Ikate Elegushi',
                'country_id' => 160,
                'state_id' => 2671,
                'city_id' => 48367,
            ],
            [
                'name' => 'Lekki Phase 1',
                'country_id' => 160,
                'state_id' => 2671,
                'city_id' => 48367,
            ],
            [
                'name' => 'Chevron Drive',
                'country_id' => 160,
                'state_id' => 2671,
                'city_id' => 48367,
            ],
            [
                'name' => 'Victoria Island',
                'country_id' => 160,
                'state_id' => 2671,
                'city_id' => 48367,
            ],
        ];
        
        // And now, let's create a few records in our database:
        foreach ($locations as $location) {
            Location::create([
                'name' => $location['name'],
                'city_id' => $location['city_id'],
                'state_id' => $location['state_id'],
                'country_id' => $location['country_id'],
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ]);
        }
    }
}
