<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coworking;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon as Carbon;

$factory->define(Coworking::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
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
    ];
});
