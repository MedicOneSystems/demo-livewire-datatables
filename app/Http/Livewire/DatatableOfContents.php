<?php

namespace App\Http\Livewire;

use App\Page;
use Mediconesystems\LivewireDatatables\Field;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfContents extends LivewireDatatable
{
    public $hideShow = true;
    public $header = false;
    public $paginationControls = false;

    public function fields()
    {
        return collect([
            Field::fromColumn('pages.title')
                ->name('Page')
                ->callback('homePageLink'),
            Field::fromColumn('pages.description')
        ]);
    }

    public function homePageLink($value)
    {
        return view('livewire-datatables::link', [
            'href' => "/$value",
            'slot' => ucfirst($value)
        ]);
    }
}
