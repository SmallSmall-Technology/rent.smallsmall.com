<?php

use Illuminate\Database\Seeder;
use App\CoworkingCarParkingTypes;

class CoworkingCarParkingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        CoworkingCarParkingTypes::truncate();

        $parking_types = [
            ["name" => "Any","type" => "0"],
            ["name" => "Yes","type" => "1"],
            ["name" => "No","type" => "2"],
        ];

        // And now, let's create a few in our database:
        foreach($parking_types as $parking_type) {
            CoworkingCarParkingTypes::create([
                'type' => $parking_type['type'],
                'name' => $parking_type['name']
            ]);
        }
    }
}
