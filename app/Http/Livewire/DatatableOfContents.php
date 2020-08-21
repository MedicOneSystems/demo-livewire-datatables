<?php

namespace App\Http\Livewire;

use App\Page;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfContents extends LivewireDatatable
{
    public $model = Page::class;

    public function columns()
    {
        return [
            Column::callback('title', function ($value) {
                return view('datatables::link', [
                    'href' => "/" . Str::slug($value),
                    'slot' => ucfirst($value)
                    ]);
            })
                ->label('Page')
                ->sortBy('id')
                ->defaultSort('asc'),

            Column::name('description')
        ];
    }
}
