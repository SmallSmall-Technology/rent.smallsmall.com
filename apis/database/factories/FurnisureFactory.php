<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Furnisure;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon as Carbon;

$factory->define(Furnisure::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'cost_per_month' => $faker->randomNumber(),
        'furnisure_type_id' => rand(0, 3),
        'is_available' => rand(0, 1),
        'is_favourite' => rand(0, 1),
        'is_rented' => rand(0, 1),
        'created_at' => Carbon::now()->addDay(),
        'updated_at' => Carbon::now()->addDay(),
    ];
});
