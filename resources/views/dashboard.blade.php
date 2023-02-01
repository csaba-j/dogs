<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Dogs in database:
            </h2>  

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!--    Listing    -->
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach($dogs as $dog)
                            <a href="{{$dog->wikipedia_url}}" class="group">
                                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                    <img src="{{ $dog->reference_image_name != null ? asset('storage/'.$dog->reference_image_name) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/300px-No_image_available.svg.png'  }}" alt="A cute dog." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">{{$dog->temperament}}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">{{$dog->name}}</p>
                            </a>
                            @endforeach
                        </div>

                        <!-- More products... -->
                    </div>
                </div>
                <!--  End listing  -->
            </div>
        </div>
    </div>
</x-app-layout>
