@extends('layouts.base')
@section('body')
<div class="bg-gray-300 min-h-screen">
    <nav class="bg-white shadow">
        <div class="px-4 lg:px-16 xl:px-32">
            <div class="relative flex justify-between items-center h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <x-mos />
                    </div>
                    <div class="hidden sm:ml-6 sm:flex">
                        <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->path() === '' ? 'border-blue-500' : 'border-transparent'}} text text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                            Home
                        </a>
                        <a href="/simple" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 {{ request()->path() === 'simple' ? 'border-blue-500' : 'border-transparent'}} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Simple
                        </a>
                        <a href="/intermediate" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 {{ request()->path() === 'intermediate' ? 'border-blue-500' : 'border-transparent'}} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Intermediate
                        </a>
                        <a href="/complex" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 {{ request()->path() === 'complex' ? 'border-blue-500' : 'border-transparent'}} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Complex
                        </a><a href="/relation" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 {{ request()->path() === 'relation' ? 'border-blue-500' : 'border-transparent'}} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Relation
                        </a><a href="/actions" class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 {{ request()->path() === 'deletable' ? 'border-blue-500' : 'border-transparent'}} text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Actions
                        </a>
                    </div>
                </div>
                <div>
                    <a href="https://github.com/mediconesystems/livewire-datatables"><x-github  class="text-blue-300 hover:text-blue-400" /></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="px-4 lg:px-16 xl:px-32">
        @yield('content')
    </div>
</div>
@endsection
