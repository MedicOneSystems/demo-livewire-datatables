@extends('layouts.app')
@section('title', 'Complex')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Complex</h1>

    <livewire:complex-demo-table />

    <x-code path="resources/views/complex.blade.php">
        @verbatim
        <livewire:complex-demo-table />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/ComplexDemoTable.php" />

    <x-code file="app/User.php" />
</div>
@endsection