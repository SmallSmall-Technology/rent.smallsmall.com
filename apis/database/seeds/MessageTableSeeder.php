<?php

use Illuminate\Database\Seeder;
use App\Message;
use Illuminate\Support\Carbon as Carbon;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Message::truncate();

        $faker = \Faker\Factory::create();
        
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Message::create([
                'topic_id' => 1,
                'user_id' => 1,
                'status' => (rand(0, 1) == 1) ? 'pending' : 'approved',
                'body' => $faker->paragraph(),
                'created_at' => Carbon::now()->addDay(),
                'updated_at' => Carbon::now()->addDay(),
            ]);
        }
    }
}
