@extends('layouts.app')

@section('content')
<div class="mx-8 lg:mx-20 py-10 space-y-8">
    <h1 class="text-2xl">Intermediate</h1>

    <livewire:intermediate-demo-table model="App\User" />

    <x-code path="resources/views/intermediate.blade.php">
        @verbatim
        <livewire:livewire-datatable
    model="App\User"
    :hide-show="true"
    :except="['users.updated_at', 'users.email_verified_at']"
    :uppercase="['users.id', 'users.dob']"
    :truncate="['users.bio']"
    :formatDates="['users.dob']"
    :dateFilters="['users.dob']"
    :rename="['users.created_at' => 'Created']"
/>
        @endverbatim
    </x-code>
    <div>
        <div class="mt-20 mb-16">
            <div class="w-full h-1 bg-gray-600"></div>
            <div class="">
                <div class="mx-auto w-16 h-10 -mt-5 text-2xl text-center bg-gray-300 text-gray-800">OR</div>
            </div>
        </div>
    </div>

    <x-code path="resources/views/intermediate.blade.php">
        @verbatim
        <livewire:intermediate-demo-table model="App\User" />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/IntermediateDemoTable.php" />
</div>
@endsection
