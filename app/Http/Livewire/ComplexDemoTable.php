<?php

namespace App\Http\Livewire;

use App\User;
use App\Planet;
use App\Weapon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\ColumnSet;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumericColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ComplexDemoTable extends LivewireDatatable
{

    public function builder()
    {
        return User::query()
            ->leftJoin('planets', 'planets.id', 'users.planet_id');
    }

    public function columns()
    {
        return ColumnSet::fromArray([

            NumericColumn::field('users.id')
                ->label('ID')
                ->filterable()
                ->linkTo('user', 6)
                ,

            Column::field('users.id')
                ->label('Closure')
                ->filterable()
                ->callback(function($value, $row) {
                    return 'User ' . $value . ' is from ' . $row['Planet'];
                }),

            BooleanColumn::field('users.email_verified_at')
                ->label('Email Verified')
                ->filterable(),

            Column::field('users.name')
                ->defaultSort('asc')
                ->editable()
                ->searchable()
                ->filterable(),

            Column::field('planets.name')
                ->label('Planet')
                ->filterable($this->planets)
                ->searchable(),

            DateColumn::field('users.dob')
                ->label('DOB')
                ->filterable(),

            DateColumn::field('users.dob')
                ->label('Birthday')
                ->format('jS F')
                ->sortBy(DB::raw('DATE_FORMAT(users.dob, "%m%d%Y")')),

            NumericColumn::raw('FLOOR(DATEDIFF(NOW(), users.dob)/365) AS Age')
                ->sortBy(DB::raw('DATEDIFF(NOW(), users.dob)'))
                ->filterable(),

            NumericColumn::field('planets.orbital_period')
                ->filterable()
                ->hide(),

            Column::raw("IF(planets.orbital_period REGEXP '^-?[0-9]+$', CONCAT(ROUND(DATEDIFF(NOW(), users.dob) / planets.orbital_period, 1), ' ', planets.name, ' years'), '---') AS `Native Age`")
                ->hide(),

            TimeColumn::field('users.bedtime')
                ->filterable(),

            Column::field('users.bedtime')
                ->label('Go to bed')
                ->callback(function ($date){
                    if (!$date) { return; }
                    return Carbon::parse($date)->isPast()
                        ? Carbon::parse($date)->addDay()->diffForHumans(['parts' => 2])
                        : Carbon::parse($date)->diffForHumans(['parts' => 2]);
                })->hide(),

            Column::field('users.email')
                ->searchable()
                ->filterable()
                ->hide(),

            Column::field('users.bio')
                ->truncate(20)
                ->filterable(),

            Column::field('users.role')
                ->searchable()
                ->filterable([
                    'Stormtrooper',
                    'AT-AT Pilot',
                    'AT-ST Driver',
                    'Imperial Guard',
                    'Shock Trooper',
                    'Shadow Trooper',
                    'Purge Trooper',
                    'Jumptrooper'
                ]),

            Column::scope('selectGroupedWeaponNames', 'Weapons')
                ->filterable($this->weapons, 'filterWeaponNames')
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
}
