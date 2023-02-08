<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (Session::has('message'))
            <div class="font-semibold text-xl text-gray-800 leading-tight">{{ Session::get('message') }}</div>
        @endif
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Dogs in database:
            </h2>  

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!--    Listing    -->
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                        <form method="get" action="{{url('dashboard/search')}}">
                        @csrf
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div class="input">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name*</label>
                                        <input type="text" name="name" id="name" value="{{ old('name') }}">
                                    </div>
                                        <button>Click to filter</button>
                            </div>
                        </form>

                        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach($dogs as $dog)
                            <div class="relative">
                                <a href="{{$dog->wikipedia_url}}" class="group">
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                        @if($dog->image['url'] != null)
                                            <img src="{{ $dog->image['url'] }}"alt="A cute dog." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        @elseif($dog->reference_image_name != null)
                                            <img src="{{ asset('storage/'.$dog->reference_image_name) }}" alt="A cute dog." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        @else
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/300px-No_image_available.svg.png"alt="A cute dog." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                        @endif
                                    </div>
                                    <h3 class="mt-4 text-sm text-gray-700">{{$dog->temperament}}</h3>
                                    <p class="mt-1 text-lg font-medium text-gray-900">{{$dog->name}}</p>
                                </a>
                                <a href="{{ url('edit/'.$dog->id) }}"><button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full">Edit</button></a>
                                <a href="{{ url('confirm_delete/'.$dog->id) }}"><button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full">Delete</button></a>
                            </div>

                            @endforeach
                        </div>
                        {{ $dogs->links() }}


                        <!-- More products... -->
                    </div>
                </div>
                <!--  End listing  -->
            </div>
        </div>
    </div>
</x-app-layout>
