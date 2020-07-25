@extends('layouts.app')
@section('title', 'Intermediate   ')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Intermediate</h1>

    <livewire:datatable
        model="App\User"
        sort="name|asc"
        exclude="bio, created_at, updated_at, email_verified_at"
        searchable="name, email"
        hide="planet_id, email"
        dates="dob"
        times="bedtime|g:i A"
        renames="id|ID, planet_id|Planet ID, dob|DOB"
        exportable
    />

    <x-code path="resources/views/intermediate.blade.php">

        @verbatim
            <livewire:datatable
    model="App\User"
    sort="name|asc"
    exclude="bio, created_at, updated_at, email_verified_at"
    hide="planet_id, email"
    dates="dob"
    times="bedtime|g:i A"
    renames="id|ID, planet_id|Planet ID, dob|DOB"
/>
        @endverbatim
    </x-code>
</div>
@endsection