<?php

namespace App\Http\Livewire;

use App\Page;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\ColumnSet;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfContents extends LivewireDatatable
{
    public $model = Page::class;

    public function columns()
    {
        return ColumnSet::fromArray([
            Column::field('pages.title')
                ->label('Page')
                ->callback('link'),

            Column::field('pages.description')
        ]);
    }

    public function link($value)
    {
        return view('datatables::link', [
            'href' => "/" . Str::slug($value),
            'slot' => ucfirst($value)
        ]);
    }
}
