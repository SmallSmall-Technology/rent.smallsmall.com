<?php

use Illuminate\Database\Seeder;
use App\CoworkingInterestType;

class CoworkingInterestTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        CoworkingInterestType::truncate();

        $interest_types = [
            ["name" => "Any","type" => "0"],
            ["name" => "Tech","type" => "1"],
            ["name" => "Fashion","type" => "2"],
            ["name" => "Finance","type" => "3"],
        ];

        // And now, let's create a few articles in our database:
        foreach($interest_types as $interest_type) {
            CoworkingInterestType::create([
                'type' => $interest_type['type'],
                'name' => $interest_type['name']
            ]);
        }
    }
}
