<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run()
    {
        Region::create(['name' => 'Deep Core']);
        Region::create(['name' => 'Core Worlds']);
        Region::create(['name' => 'Colonies']);
        Region::create(['name' => 'Inner Rim']);
        Region::create(['name' => 'Expansion Region']);
        Region::create(['name' => 'Mid Rim']);
        Region::create(['name' => 'Outer Rim Territories']);
        Region::create(['name' => 'Unknown Regions']);
        Region::create(['name' => 'Western']);
        Region::create(['name' => 'Wild Space']);
    }
}
