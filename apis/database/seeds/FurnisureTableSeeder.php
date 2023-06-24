<?php

use Illuminate\Database\Seeder;
use App\Furnisure;
use Illuminate\Support\Carbon as Carbon;


class FurnisureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Furnisure::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Furnisure::create([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'cost_per_month' => $faker->randomNumber(),
                // 'images_array' => $faker->array('1'),
                'furnisure_type_id' => rand(0, 3),
                'is_available' => rand(0, 1),
                'is_rented'    => rand(0, 1),
                'is_favourite' => rand(0, 1),
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ]);
        }
    }
}
