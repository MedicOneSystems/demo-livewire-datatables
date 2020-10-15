@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="py-10 space-y-8">

    <h1 class="text-3xl text-gray-700">Datatable of Contents</h1>

    <livewire:datatable-of-contents  hide-pagination/>

    <x-code path="resources/views/home.blade.php">
        @verbatim
        <livewire:datatable-of-contents hide-header hide-pagination />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/DatatableOfContents.php" />
</div>

@endsection
