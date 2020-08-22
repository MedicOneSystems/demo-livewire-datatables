<?php

namespace App\Http\Livewire;

use App\Post;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DeletableDemoTable extends LivewireDatatable
{
    public $model = Post::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->filterable(),
            Column::name('title')->filterable()->searchable(),
            Column::name('body')->truncate()->filterable()->searchable(),
            DateColumn::name('created_at')->filterable(),
            Column::delete()->label('delete')->alignRight()
        ];
    }
}
