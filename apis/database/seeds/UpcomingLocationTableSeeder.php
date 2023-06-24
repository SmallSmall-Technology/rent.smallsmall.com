<?php

use Illuminate\Database\Seeder;
use App\UpcomingLocation;
use Illuminate\Support\Carbon;

class UpcomingLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Let's truncate our existing records to start from scratch.
         UpcomingLocation::truncate();

         $up_locations = [
             [
                 'user_id' => 1,
                 'location_id' => 1,
             ],
             [
                 'user_id' => 1,
                 'location_id' => 3,
             ]
         ];
         
         // And now, let's create a few records in our database:
         foreach ($up_locations as $up_location) {
             UpcomingLocation::create([
                 'user_id' => $up_location['user_id'],
                 'location_id' => $up_location['location_id'],
                 'created_at' => Carbon::now()->addDay(),
                 'updated_at' => Carbon::now()->addDay(),
             ]);
         }
    }
}
