<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delete Dog '.$dog->name) }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto my-auto sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold dark:text-white mt-10">Are you sure you want to delete the dog {{ $dog->name }} ?</h2>
        <br>
        <a href="{{ url('dashboard') }}"><button class="border-solid border-2 border-indigo-600 bg-indigo-200 hover:bg-indigo-600 text-black font-bold py-2 px-4 rounded-full">Cancel</button></a>
        <a href="{{ url('delete/'.$dog->id) }}"><button class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded-full">Delete</button></a>

    </div>

</x-app-layout>
