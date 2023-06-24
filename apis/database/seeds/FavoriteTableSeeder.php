<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Favorite;
use App\Residential;
use App\Storage;
use App\Coworking;
use App\Furnisure;

class FavoriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear table
        Favorite::truncate();

        $faker = \Faker\Factory::create();
        $this->generateFavorites($faker, Residential::class);
        $this->generateFavorites($faker, Storage::class);
        $this->generateFavorites($faker, Coworking::class);
        $this->generateFavorites($faker, Furnisure::class);

    }

    private function generateFavorites($faker, $class = 'App\Residential')
    {
        // And now, let's create a few favorites.
        for ($i = 0; $i < 15; $i++) {
            for ($j = 0; $j < 10; $j++) {
                Favorite::create([
                    'user_id' => $i + 1,
                    'favoritable_id' => $j + 1,
                    'favoritable_type' => $class,
                    'created_at' => Carbon::now()->addDay(),
                    'updated_at' => Carbon::now()->addDay(),
                ]);
            }
        }
    }
}
