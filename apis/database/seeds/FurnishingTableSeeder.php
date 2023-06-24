<?php

use Illuminate\Database\Seeder;
use App\Furnishing;

class FurnishingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Furnishing::truncate();

        $furnishings = [
            ["name" => "any","type" => "0"],
            ["name" => "unfurnished","type" => "1"],
            ["name" => "furnished","type" => "2"],
            ["name" => "partially furnished","type" => "3"],
        ];

        // And now, let's create a few articles in our database:
        foreach($furnishings as $furnishing) {
            Furnishing::create([
                'type' => $furnishing['type'],
                'name' => $furnishing['name']
            ]);
        }
    }
}
