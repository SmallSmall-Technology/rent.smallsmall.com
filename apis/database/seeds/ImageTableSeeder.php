<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Image;
use App\Residential;
use App\Coworking;
use App\Furnisure;
use App\Storage;


class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the images table
        Image::truncate();

        $faker = \Faker\Factory::create();

        $this->generateImages($faker, 'residentials', Residential::class);
        $this->generateImages($faker, 'storages', Storage::class);
        $this->generateImages($faker, 'coworkings', Coworking::class);
        $this->generateImages($faker, 'furnisures', Furnisure::class);
        $this->generateImage($faker);
    }

    private function generateImages($faker, $path = 'residentials', $class = 'App\Residential')
    {
        $filepath = storage_path($path);

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }
    
        // And now, let's create a few images for Residentials:
        for ($i = 0; $i < 15; $i++) {
            for ($j = 0; $j < 5; $j++) {
                Image::create([
                    'imageable_id' => $i + 1,
                    'imageable_type' => $class,
                    'url' => $path.'/'.$j.'.jpeg',
                    'created_at' => Carbon::now()->addDay(),
                    'updated_at' => Carbon::now()->addDay(),
                ]);
            }
        }
    }

    private function generateImage($faker, $path = 'profile_photos', $class = 'App\Profile')
    {
        $filepath = storage_path($path);

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }
    
        // And now, let's create a few images for Residentials:
        for ($i = 0; $i < 15; $i++) {
            for ($j = 0; $j < 1; $j++) {
                Image::create([
                    'imageable_id' => $i + 1,
                    'imageable_type' => $class,
                    'url' => $path.'/'.$faker->word().'.jpg',
                    'created_at' => Carbon::now()->addDay(),
                    'updated_at' => Carbon::now()->addDay(),
                ]);
            }
        }
    }
}
