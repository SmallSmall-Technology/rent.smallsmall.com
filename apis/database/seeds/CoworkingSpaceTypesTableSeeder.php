<?php

use Illuminate\Database\Seeder;
use App\CoworkingSpaceType;

class CoworkingSpaceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        CoworkingSpaceType::truncate();

        $space_types = [
            ["name" => "Any","type" => "0"],
            ["name" => "1 Person","type" => "1"],
            ["name" => "2 People","type" => "2"],
            ["name" => "3 People","type" => "3"],
            ["name" => "4+ People","type" => "4"],
        ];

        // And now, let's create a few articles in our database:
        foreach($space_types as $space_type) {
            CoworkingSpaceType::create([
                'type' => $space_type['type'],
                'name' => $space_type['name']
            ]);
        }
    }
}
