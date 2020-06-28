<?php

namespace App\Http\Livewire;

use App\User;
use App\Planet;
use App\Weapon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Field;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ComplexDemoTable extends LivewireDatatable
{

    public function builder()
    {
        return User::query()
            ->leftJoin('planets', 'planets.id', 'users.planet_id');
    }

    public function fields()
    {
        return collect([
            Field::fromColumn('users.id')
                ->name('ID')
                ->linkTo('job', 6),

            Field::fromColumn('users.email_verified_at')
                ->name('Email Verified')
                ->formatBoolean()
                ->withBooleanFilter(),

            Field::fromColumn('users.name')
                ->defaultSort('asc')
                ->withTextFilter(),

            Field::fromColumn('planets.name')
                ->name('Planet')
                ->withSelectFilter($this->planets),

            Field::fromColumn('users.dob')
                ->name('DOB')
                ->withDateFilter()
                ->formatDate()
                ->hidden(),

            Field::fromColumn('users.dob')
                ->name('Birthday')
                ->formatDate('jS F')
                ->sortBy(DB::raw('DATE_FORMAT(users.dob, "%m%d%Y")')),

            Field::fromColumn('users.dob')
                ->name('Age')
                ->callback('timeDiffFromNow'),

            Field::fromColumn('planets.orbital_period')->hidden(),

            Field::fromRaw("IF(planets.orbital_period REGEXP '^-?[0-9]+$', CONCAT(ROUND(DATEDIFF(NOW(), users.dob) / planets.orbital_period), ' ', planets.name, ' years'), '---') AS `Native Age`"),

            Field::fromColumn('users.bedtime')
                ->withTimeFilter()
                ->formatTime()
                ->hidden(),

            Field::fromColumn('users.bedtime')
                ->name('Go to bed')
                ->callback('minutesToBedtime')
                ->hidden(),

            Field::fromColumn('users.email')
                ->withTextFilter()
                ->hidden(),

            Field::fromColumn('users.role')
                ->withSelectFilter([
                    'Stormtrooper',
                    'AT-AT Pilot',
                    'AT-ST Driver',
                    'Imperial Guard',
                    'Shock Trooper',
                    'Shadow Trooper',
                    'Purge Trooper',
                    'Jumptrooper'
                ]),

            Field::fromScope('selectGroupedWeaponNames', 'Weapons')
                ->withScopeSelectFilter('filterWeaponNames', $this->weapons)
        ]);
    }

    public function getPlanetsProperty()
    {
        return Planet::all();
    }

    public function getWeaponsProperty()
    {
        return Weapon::all();
    }

    public function timeDiffFromNow($date)
    {
        return $date ? Carbon::parse($date)->longAbsoluteDiffForHumans(['parts' => 1]) : null;
    }

    public function minutesTobedtime($date)
    {
        return $date ? Carbon::parse($date)->diffForHumans(['parts' => 2]) : null;
    }
}
