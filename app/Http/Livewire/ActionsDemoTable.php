<?php

namespace App\Http\Livewire;

use App\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ActionsDemoTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->filterable(),

            Column::name('name')->filterable()->searchable(),

            Column::name('email')->truncate()->filterable()->searchable(),

            DateColumn::name('created_at')->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('table-actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }
}
