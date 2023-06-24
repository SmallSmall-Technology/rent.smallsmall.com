<?php

use Illuminate\Database\Seeder;
use App\Coworking;
use Illuminate\Support\Carbon as Carbon;

class CoworkingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Coworking::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Coworking::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'cost_per_month' => $faker->randomNumber(),
                'location_id' => $faker->randomNumber(),
                'address' => $faker->address,
                'people_per_space' => rand(0, 5),
                'with_parking' => rand(0, 1),
                'car_parking' => rand(0, 2),
                'space_type' => rand(0, 4),
                'interest' => rand(0, 3),
                'with_generator' => rand(0, 1),
                'is_furnished' => rand(0, 1),
                'is_rented' => rand(0, 1),
                'is_favourite' => rand(0, 1),
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ]);
        }
    }
}
