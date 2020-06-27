@extends('layouts.app')

@section('content')
<div class="lg:mx-20 xl:mx-32 py-10 space-y-8">
    <h1 class="pb-4 text-2xl">Intermediate</h1>

    <livewire:intermediate-demo-table model="App\User" />

    <x-code path="resources/views/intermediate.blade.php">
        @verbatim
        <livewire:intermediate-demo-table model="App\User" />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/IntermediateDemoTable.php" />
</div>
@endsection
