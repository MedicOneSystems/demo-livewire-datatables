<?php

namespace App\Http\Livewire;

use App\User;
use App\Weapon;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Mediconesystems\LivewireDatatables\Field;
use Mediconesystems\LivewireDatatables\Fieldset;
use Mediconesystems\LivewireDatatables\Traits\LivewireDatatable;

class IntermediateDemoTable extends Component
{
    use LivewireDatatable;

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
