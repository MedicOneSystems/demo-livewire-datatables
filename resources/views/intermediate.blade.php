@extends('layouts.app')

@section('content')
<div class="mx-8 lg:mx-20 py-10 space-y-8">
    <h1 class="text-2xl">Intermediate</h1>

    <livewire:datatable model="App\User" sort="name|asc" exclude="bio, created_at, updated_at, email_verified_at"
        hide="planet_id, email" dates="dob" times="bedtime|g:i A" renames="id|ID, planet_id|Planet ID, dob|DOB" />

    <x-code path="resources/views/intermediate.blade.php">
        @verbatim
        <livewire:datatable model="App\User" sort="name|asc" exclude="bio, created_at, updated_at, email_verified_at"
            hide="planet_id, email" dates="dob" times="bedtime|g:i A" renames="id|ID, planet_id|Planet ID, dob|DOB" />
        @endverbatim
    </x-code>
</div>
@endsection