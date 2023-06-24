<?php

use Illuminate\Database\Seeder;
use App\Residential;

class ResidentialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Residential::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Residential::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'num_of_rooms' => rand(1,10),
                'num_of_baths' => rand(1,10),
                'cost_per_month' => $faker->randomNumber(),
                'location_id' => $faker->randomNumber(),
                'address' => $faker->address,
                'is_rented' => rand(0, 1),
                'room_type' => rand(0, 5),
                'furnishing' => rand(0, 4)
            ]);
        }
    }
}
