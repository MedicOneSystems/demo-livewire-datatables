@extends('layouts.app')
@section('title', 'Actions')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Actions</h1>

    <livewire:actions-demo-table />

    <livewire:restore-all model="App\User" />

    <x-code path="resources/views/actions.blade.php">
        @verbatim
    <livewire:actions-demo-table />


<livewire:restore-all model="App\User" />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/ActionsDemoTable.php" />
    <x-code file="resources/views/table-actions.blade.php" />
    <x-code file="resources/views/components/modal.blade.php" />
</div>
@endsection
