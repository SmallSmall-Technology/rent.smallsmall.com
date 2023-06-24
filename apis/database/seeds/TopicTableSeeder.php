<?php

use Illuminate\Database\Seeder;
use App\Topic;
use Illuminate\Support\Carbon as Carbon;


class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Topic::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few records in our database:
        for ($i = 0; $i < 50; $i++) {
            Topic::create([
                'name' => $faker->sentence(),
                'user_id' => 1, 
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ]);
        }
    }
}
