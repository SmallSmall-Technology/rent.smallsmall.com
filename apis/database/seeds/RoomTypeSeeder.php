<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        RoomType::truncate();

        $room_types = [
            ["name" => "any","type" => "0"],
            ["name" => "studio","type" => "1"],
            ["name" => "1 Bed","type" => "2"],
            ["name" => "2 Beds","type" => "3"],
            ["name" => "3 Beds","type" => "4"],
            ["name" => "4+ Beds","type" => "5"],
        ];

        // And now, let's create a few articles in our database:
        foreach($room_types as $room_type) {
            RoomType::create([
                'type' => $room_type['type'],
                'name' => $room_type['name']
            ]);
        }
    }
}
