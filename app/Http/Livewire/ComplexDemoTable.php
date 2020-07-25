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
    public $model = User::class;
    public $with = ['planet'];
    public $exportable = true;

    public function columns()
    {
        return ColumnSet::fromArray([

            NumericColumn::name('id')
                ->label('ID')
                ->filterable()
                ->linkTo('user', 6),

            Column::callback('users.id', function($value, $row) {
                    return "User $value hails from " . $row->{'planet.name'};
                })->label('Closure')
                ->filterable()
                ,

            BooleanColumn::name('email_verified_at')
                ->label('Email Verified')
                ->filterable(),

            Column::name('name')
                ->defaultSort('asc')
                ->editable()
                ->searchable()
                ->filterable(),

            Column::name('planet.name')
                ->label('Planet')
                ->filterable($this->planets)
                ->searchable(),

            DateColumn::name('dob')
                ->label('DOB')
                ->filterable(),

            DateColumn::name('dob AS dob2')
                ->label('Birthday')
                ->format('jS F')
                ->sortBy(DB::raw('DATE_FORMAT(users.dob2, "%m%d%Y")')),

            // NumericColumn::raw('FLOOR(DATEDIFF(NOW(), users.dob)/365) AS Age')
            //     ->sortBy(DB::raw('DATEDIFF(NOW(), users.dob)'))
            //     ->filterable(),

            NumericColumn::name('planet.orbital_period')
                ->filterable()
                ->hide(),

            // Column::raw("IF(planets.orbital_period REGEXP '^-?[0-9]+$', CONCAT(ROUND(DATEDIFF(NOW(), users.dob) / planets.orbital_period, 1), ' ', planets.name, ' years'), '---') AS `Native Age`")
            //     ->hide(),

            TimeColumn::name('bedtime')
                ->filterable(),

                Column::callback('bedtime', 'bedtime')
                ->label('Go to bed')
                ->hide(),

            Column::name('email')
                ->searchable()
                ->filterable()
                ->hide(),

            Column::name('bio')
                ->truncate(20)
                ->filterable(),

            Column::name('role')
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

            // Column::scope('selectGroupedWeaponNames', 'Weapons')
            //     ->filterable($this->weapons, 'filterWeaponNames'),

            // BooleanColumn::scope('hasLightSaber', 'LS')
            //     ->filterable(null, 'filterHasLightSaber')
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

    public function bedtime($date){
        if (!$date) { return; }
        return Carbon::parse($date)->isPast()
            ? Carbon::parse($date)->addDay()->diffForHumans(['parts' => 2])
            : Carbon::parse($date)->diffForHumans(['parts' => 2]);
    }
}
