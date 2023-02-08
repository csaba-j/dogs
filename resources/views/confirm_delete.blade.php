<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Dog '.$dog->name) }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        Are you sure you want to delete the dog {{ $dog->name }} ?

        <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full"><a href="{{ url('delete/'.$dog->id) }}">Delete</a></button>
        <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full"><a href="{{ url('dashboard') }}">Cancel</a></button>

    </div>

</x-app-layout>
