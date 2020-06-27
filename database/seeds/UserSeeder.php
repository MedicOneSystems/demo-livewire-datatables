<?php

use App\User;
use App\Weapon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 20000)->create();

        User::all()->each(function ($user) {
            for ($i = 0; $i < rand(0, 3); $i++) {
                $user->weapons()->attach(Weapon::all()->random());
            }
        });
    }
}
