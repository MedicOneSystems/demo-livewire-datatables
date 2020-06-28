<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IntermediateDemoTable extends LivewireDatatable
{
    public function fields()
    {
        return $this->fieldsetFromModel()
            ->except('users.updated_at, users.email_verified_at')
            ->uppercase(['users.id', 'users.dob'])
            ->rename(['users.created_at' => 'Created'])
            ->formatDates(['users.dob'])
            ->dateFilters(['users.dob'])
            ->fields();
    }
}
