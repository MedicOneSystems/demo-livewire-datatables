<?php

namespace App\Http\Livewire;

use App\Page;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Field;
use Mediconesystems\LivewireDatatables\Fieldset;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfContents extends LivewireDatatable
{
    public $model = Page::class;

    public function fieldset()
    {
        return Fieldset::fromArray([
            Field::fromColumn('pages.title')
                ->name('Page')
                ->callback('link'),

            Field::fromColumn('pages.description')
        ]);
    }

    public function link($value)
    {
        return view('livewire-datatables::link', [
            'href' => "/" . Str::slug($value),
            'slot' => ucfirst($value)
        ]);
    }
}
