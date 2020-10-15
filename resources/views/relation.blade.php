@extends('layouts.app')
@section('title', 'Relation')
@section('content')
<div class="py-10 space-y-8">
    <h1 class="text-3xl text-gray-700">Complex</h1>

    <livewire:relation-demo-table />

    <x-code path="resources/views/relation.blade.php">
        @verbatim
        <livewire:relation-demo-table />
        @endverbatim
    </x-code>

    <x-code file="app/Http/Livewire/RelationDemoTable.php" />

</div>
@endsection
