@extends('layouts.app')

@section('content')
<div class="lg:mx-20 xl:mx-32 py-10 space-y-8">
    <h1 class="text-2xl">Simple</h1>

    <livewire:datatable model="App\User" />

    <x-code path="resources/views/simple.blade.php">
        @verbatim
        <livewire:datatable model="App\User" />
        @endverbatim
    </x-code>
</div>
@endsection
