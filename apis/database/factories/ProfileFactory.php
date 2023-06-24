<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon as Carbon;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name(),
        'last_name' => $faker->name(),
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'gender' => (rand(0,1) == 1 ) ? "Male": "Female",
        'created_at' => Carbon::now()->addDay(),
        'updated_at' => Carbon::now()->addDay(),
    ];
});
