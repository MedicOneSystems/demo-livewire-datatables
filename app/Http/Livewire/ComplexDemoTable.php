<?php

namespace App\Http\Livewire;

use App\User;
use App\Planet;
use App\Region;
use App\Weapon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\NumericColumn;
use Mediconesystems\LivewireDatatables\EditableColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ComplexDemoTable extends LivewireDatatable
{
    public $hideable = 'inline';
    public $exportable = true;

    public function builder()
    {
        return User::query()
            ->leftJoin('planets', 'planets.id', 'users.planet_id')
            ->leftJoin('regions', 'regions.id', 'planets.region_id');
    }

    public function columns()
    {
        return [
            NumericColumn::name('id')
                ->label('ID')
                ->filterable()
                ->linkTo('user', 6),

            Column::callback(['id', 'planet.name'], function($id, $planetName) {
                    return "User $id hails from " . $planetName;
                })->label('Computed (php closure)')
                ->filterable(),

            Column::raw('CONCAT("User ", users.id, " hails from ", planets.name) AS plantName')
                ->label('Computed (raw SQL)')
                ->filterable(),

            BooleanColumn::name('email_verified_at')
                ->label('Email Verified')
                ->filterable(),

            Column::name('name')
                ->editable()
                ->defaultSort('asc')
                ->searchable()
                ->filterable(),

            Column::name('planet.name')
                ->label('Planet')
                ->filterable($this->planets)
                ->searchable(),

            Column::name('planet.region.name')
                ->label('Region')
                ->filterable($this->regions)
                ->searchable(),

            DateColumn::name('dob')
                ->label('DOB')
                ->filterable(),

            DateColumn::name('dob AS dob2')
                ->label('Birthday')
                ->format('jS F')
                ->sortBy(DB::raw('DATE_FORMAT(users.dob, "%m%d%Y")')),

            NumericColumn::raw('FLOOR(DATEDIFF(NOW(), users.dob)/365) AS Age')
                ->filterable(),

            NumericColumn::name('planet.orbital_period')
                ->filterable()
                ->hide(),

            Column::raw("IF(planets.orbital_period REGEXP '^-?[0-9]+$', CONCAT(ROUND(DATEDIFF(NOW(), users.dob) / planets.orbital_period, 1), ' ', planets.name, ' years'), '---') AS native_age")
                ->filterable()
                ->hide(),

            TimeColumn::name('bedtime')
                ->filterable(),

            Column::callback('bedtime', 'bedtime')
                ->label('Go to bed')
                ->hide(),

            Column::name('email')
                ->searchable()
                ->filterable()
                ->view('components.email'),

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

            Column::scope('selectGroupedWeaponNames', 'Weapons')
                ->filterable($this->weapons, 'filterWeaponNames'),

            BooleanColumn::scope('hasLightSaber', 'Light Saber')
                ->filterable(null, 'filterHasLightSaber')
        ];
    }

    public function getPlanetsProperty()
    {
        return Planet::pluck('name');
    }

    public function getRegionsProperty()
    {
        return Region::pluck('name');
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
