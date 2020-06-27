<?php

use App\User;
use App\Weapon;
use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    public function run()
    {
        Weapon::create([
            'name' => 'Light Saber',
            'power' => 1000,
        ]);

        Weapon::create([
            'name' => 'T-21 Light Blaster',
            'power' => 100,
        ]);

        Weapon::create([
            'name' => 'RT-97C Heavy Blaster',
            'power' => 300,
        ]);

        Weapon::create([
            'name' => 'Shock Grenade',
            'power' => 500,
        ]);

        Weapon::create([
            'name' => 'Thermal Detonator',
            'power' => 500,
        ]);

        Weapon::create([
            'name' => 'Force Lightning',
            'power' => 2000,
        ]);

        Weapon::create([
            'name' => 'Bowcaster',
            'power' => 600,
        ]);
    }
}
