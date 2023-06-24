<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Residential;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon as Carbon;

$factory->define(Residential::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'num_of_rooms' => rand(1, 10),
        'num_of_baths' => rand(1, 10),
        'cost_per_month' => $faker->randomNumber(),
        'location_id' => $faker->randomNumber(),
        'address' => $faker->address,
        'is_rented' => rand(0, 1),
        'featured' => null,
        'room_type' => rand(0, 5),
        'furnishing' => rand(0, 4),
        'created_at' => Carbon::now()->addDay(),
        'updated_at' => Carbon::now()->addDay(),
    ];
});

$factory->state(Residential::class, 'featured',
    [
        'featured' => now(),
    ]);
