<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Storage;
use Illuminate\Support\Carbon as Carbon;


$factory->define(Storage::class, function (Faker $faker) {
    return [
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
    ];
});
