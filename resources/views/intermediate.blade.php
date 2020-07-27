@extends('layouts.app')
@section('title', 'Intermediate   ')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Intermediate</h1>

    <livewire:datatable
        model="App\User"
        with="planet"
        sort="name|asc"
        include="id, name, planet.name, dob, bedtime, role, latitude, longitude, created_at"
        searchable="name, planet.name"
        hide="latitude, longitude"
        dates="dob, created_at"
        times="bedtime|g:i A"
        renames="id|ID, planet.name|Planet, dob|DOB, created_at|Created"
        hideable="select"
        exportable
    />

    <x-code path="resources/views/intermediate.blade.php">

        @verbatim
        <livewire:datatable
    model="App\User"
    with="planet"
    sort="name|asc"
    include="id, name, planet.name, dob, bedtime, role, latitude, longitude, created_at"
    searchable="name, planet.name"
    hide="latitude, longitude"
    dates="dob, created_at"
    times="bedtime|g:i A"
    renames="id|ID, planet.name|Planet, dob|DOB, created_at|Created"
    hideable="select"
    exportable
/>
        @endverbatim
    </x-code>
</div>
@endsection