<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();
        
        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('rentsmallsmall8');

        User::create([
            'name' => 'Emmanuel Torty',
            'email' => 'ultimatetorty@gmail.com',
            'password' => $password,
            'phone' => '08030892639',
            'about_us' => 'Facebook',
            'income_level' => '500,000',
            'role' => 'super_admin'
        ]);

        User::create([
            'name' => 'Oluwatobiloba Akinpelu',
            'email' => 'akinpeluoluwatobiloba@gmail.com',
            'password' => $password,
            'phone' => '08168020499',
            'about_us' => 'LinkedIn',
            'income_level' => '500,000',
            'role' => 'super_admin'
        ]);
        
        // And now let's generate a few users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'phone' => $faker->phoneNumber,
                'about_us' => 'Twitter',
                'income_level' => '400000',

            ]);
        }
    }
}
