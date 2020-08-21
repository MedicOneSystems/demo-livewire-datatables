<?php

use App\Car;
use App\Post;
use App\User;
use App\Planet;
use App\Weapon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 2000)->create();

        $weapons = Weapon::all();

        User::all()->each(function ($user) use ($weapons) {
            $user->car()->save(factory(Car::class)->make());
            for ($i = 0; $i < rand(0, 5); $i++) {
                $user->posts()->save(factory(Post::class)->make());
            }
            $user->weapons()->attach($weapons->random(rand(0, 3)));
        });
    }
}
