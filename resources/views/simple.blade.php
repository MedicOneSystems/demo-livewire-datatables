@extends('layouts.app')
@section('title', 'Simple')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Simple</h1>

    <livewire:datatable model="App\User" />

    <x-code path="resources/views/simple.blade.php">
        @verbatim
        <livewire:datatable model="App\User" />
        @endverbatim
    </x-code>
</div>
@endsection