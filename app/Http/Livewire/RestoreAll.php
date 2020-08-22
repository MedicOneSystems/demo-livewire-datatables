<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RestoreAll extends Component
{
    public $model;

    public function mount($model)
    {
        $this->model = $model;
    }

    public function restoreAll()
    {
        $this->model::onlyTrashed()->get()->each->restore();
        $this->emit('refreshLivewireDatatable');
    }

    public function render()
    {
        return <<<'blade'
            <div class="flex justify-center">
                <button wire:click="restoreAll" class="px-3 py-2 bg-orange-600 text-white rounded hover:bg-orange-800 focus:outline-none">Restore All</button>
            </div>
        blade;
    }
}
