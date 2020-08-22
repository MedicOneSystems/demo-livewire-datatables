@extends('layouts.app')
@section('title', 'Complex')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Deletable</h1>

    <livewire:deletable-demo-table />

    <livewire:restore-all model="App\Post" />

    <x-code path="resources/views/relation.blade.php">
        @verbatim
        <livewire:deletable-demo-table />

<livewire:restore-all model="App\Post" />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/DeletableDemoTable.php" />
    <x-code file="app/Http/Livewire/RestoreAll.php" />

</div>
@endsection
