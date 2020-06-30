<?php

namespace App\Http\Livewire;

use App\User;
use App\Planet;
use App\Weapon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Field;
use Mediconesystems\LivewireDatatables\Fieldset;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ComplexDemoTable extends LivewireDatatable
{

    public function builder()
    {
        return User::query()
            ->leftJoin('planets', 'planets.id', 'users.planet_id');
    }

    public function fieldset()
    {
        return Fieldset::fromArray([
            Field::fromColumn('users.id')
                ->name('ID')
                ->linkTo('user', 6),

            Field::fromColumn('users.email_verified_at')
                ->name('Email Verified')
                ->formatBoolean()
                ->withBooleanFilter(),

            Field::fromColumn('users.name')
                ->defaultSort('asc')
                ->globalSearch()
                ->withTextFilter(),

            Field::fromColumn('planets.name')
                ->name('Planet')
                ->globalSearch()
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

            Field::fromRaw("IF(planets.orbital_period REGEXP '^-?[0-9]+$', CONCAT(ROUND(DATEDIFF(NOW(), users.dob) / planets.orbital_period, 1), ' ', planets.name, ' years'), '---') AS `Native Age (SQL)`")
                ->hidden(),

            Field::fromColumn('users.dob')
                ->name('Native Age (PHP)')
                ->callback('nativeAge'),

            Field::fromColumn('users.bedtime')
                ->withTimeFilter()
                ->formatTime()
                ->hidden(),

            Field::fromColumn('users.bedtime')
                ->name('Go to bed')
                ->callback('minutesToBedtime')
                ->hidden(),

            Field::fromColumn('users.email')
                ->globalSearch()
                ->withTextFilter()
                ->hidden(),

            Field::fromColumn('users.bio')
                ->truncate(20)
                ->withTextFilter(),

            Field::fromColumn('users.role')
                ->globalSearch()
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
        return Planet::pluck('name');
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
        if (!$date) {
            return;
        }
        return Carbon::parse($date)->isPast()
            ? Carbon::parse($date)->addDay()->diffForHumans(['parts' => 2])
            : Carbon::parse($date)->diffForHumans(['parts' => 2]);
    }

    public function nativeAge($value, $row)
    {
        return
            $value && is_numeric($row->orbital_period) ?
            round(Carbon::parse($value)->diffInDays() / $row->orbital_period, 1) . ' ' . $row->Planet . ' years'
            : '---';
    }
}
