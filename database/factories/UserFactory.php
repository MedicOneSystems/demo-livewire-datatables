<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Planet;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => rand() % 4 === 0  ? now() : null,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'bedtime' => rand(0, 10) > 3 ? $faker->dateTimeBetween('19:00', '23:59') : $faker->dateTimeBetween('00:00', '03:59'),
        'dob' => $faker->dateTimeBetween('- 100 years'),
        'role' => $faker->randomElement(['Stormtrooper', 'AT-AT Pilot', 'AT-ST Driver', 'Imperial Guard', 'Shock Trooper', 'Shadow Trooper', 'Purge Trooper', 'Jumptrooper', null]),
        'bio' => $faker->paragraphs(2, true),
        'planet_id' => $faker->numberBetween(1, Planet::all()->count()),
        'latitude' => $faker->latitude(50.5, 51.5),
        'longitude' => $faker->longitude(-1.5, 1.5),
    ];
});
