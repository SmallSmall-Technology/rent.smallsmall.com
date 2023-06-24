<?php

use Illuminate\Database\Seeder;
use App\Storage;
use Illuminate\Support\Carbon as Carbon;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Storage::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Storage::create([
                'title' => $faker->sentence(),
                'location_id' => $faker->randomNumber(),
                'address' => $faker->address,
                'description' => $faker->paragraph(),
                'cost_per_month' => $faker->randomNumber(),
                // 'images_array' => $faker->array('1'),
                'box_per_space' => rand(1, 10),
                'furnisure_per_space' => rand(1, 10),
                'is_rented' => rand(0, 1),
                'with_security' => rand(0, 1),
                'with_furnisure' => rand(0, 1),
                'is_favourite' => rand(0, 5),
                'sqm' => $faker->randomNumber(), 
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ]);
        }
    }
}
