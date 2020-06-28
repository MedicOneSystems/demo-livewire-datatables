@extends('layouts.app')

@section('content')

<div class="w-64 mx-auto mt-20 space-y-12">


    <a class="block text-2xl px-3 py2 rounded border-2 border-transparent hover:border-blue-500" href="{{ route('simple') }}">Simple</a>
    <a class="block text-2xl px-3 py2 rounded border-2 border-transparent hover:border-blue-500" href="{{ route('intermediate') }}">Intermediate</a>
    <a class="block text-2xl px-3 py2 rounded border-2 border-transparent hover:border-blue-500" href="{{ route('complex') }}">Complex</a>
</div>

@endsection
