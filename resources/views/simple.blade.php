@extends('layouts.app')
@section('title', 'Simple')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Simple</h1>

    <livewire:datatable model="App\User" exclude="planet_id, bio, latitude, longitude, updated_at" />

    <x-code path="resources/views/simple.blade.php">
        @verbatim
        <livewire:datatable model="App\User" exclude="planet_id, bio, latitude, longitude, updated_at" />
        @endverbatim
    </x-code>
</div>
@endsection