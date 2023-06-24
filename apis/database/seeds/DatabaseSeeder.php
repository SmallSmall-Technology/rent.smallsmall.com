<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ResidentialsTableSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(FurnishingTableSeeder::class);
        $this->call(FurnisureTableSeeder::class);
        $this->call(StorageTableSeeder::class);
        $this->call(CoworkingTableSeeder::class);
        $this->call(CoworkingSpaceTypesTableSeeder::class);
        $this->call(CoworkingInterestTypesTableSeeder::class);
        $this->call(CoworkingCarParkingTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(UpcomingLocationTableSeeder::class);
    }
}
