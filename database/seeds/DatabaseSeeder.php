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
        $this->call(RegionSeeder::class);
        $this->call(PlanetSeeder::class);
        $this->call(WeaponSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(UserSeeder::class);
    }
}
