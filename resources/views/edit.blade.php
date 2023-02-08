<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Dog: '.$dog->name) }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (Session::has('message'))
            <div class="font-semibold text-xl text-gray-800 leading-tight">{{ Session::get('message') }}</div>
        @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" >
                    <a href="{{ url()->previous() }}"><button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-full">Back</button></a>
                    <br>
                    Fields marked with an asterisk (*) must be filled out.
                    <form action="{{url('update/'.$dog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="input">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name*</label>
                                <input type="text" name="name" id="name" value="{{ old('name') == '' ? $dog->name : old('name') }}">
                            </div>
                            <div class="input">
                                <label for="alt_names" class="block mb-2 text-sm font-medium text-gray-900">Alternative names</label>
                                <input type="text" name="alt_names" id="alt_names" value="{{ old('alt_names') == '' ? $dog->name : old('alt_names') }}">
                            </div>
                            <div class="input">
                                <label for="experimental" class="block mb-2 text-sm font-medium text-gray-900">Experimental</label>
                                <input type="checkbox" name="experimental" id="experimental" {{ !$dog->experimental ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="hairless" class="block mb-2 text-sm font-medium text-gray-900">Hairless</label>
                                <input type="checkbox" name="hairless" id="hairless" {{ !$dog->hairless ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="hypoallergenic" class="block mb-2 text-sm font-medium text-gray-900">Hypoallergenic</label>
                                <input type="checkbox" name="hypoallergenic" id="hypoallergenic" {{ !$dog->hypoallergenic ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="life_span" class="block mb-2 text-sm font-medium text-gray-900" required>Lifespan (eg. 12-14 years)</label>
                                <input type="text" name="life_span" id="life_span" value="{{ old('life_span') == '' ? $dog->life_span : old('life_span') }}">
                            </div>
                            <div class="input">
                                <label for="natural" class="block mb-2 text-sm font-medium text-gray-900">Natural</label>
                                <input type="checkbox" name="natural" id="natural" {{ !$dog->natural ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="origin" class="block mb-2 text-sm font-medium text-gray-900" required>Origin</label>
                                <input type="text" name="origin" id="origin" value="{{ old('origin') == '' ? $dog->origin : old('origin') }}">
                            </div>
                            <div class="input">
                                <label for="rare" class="block mb-2 text-sm font-medium text-gray-900">Rare</label>
                                <input type="checkbox" name="rare" id="rare" {{ !$dog->rare ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="rex" class="block mb-2 text-sm font-medium text-gray-900">Rex</label>
                                <input type="checkbox" name="rex" id="rex" {{ !$dog->rex ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="short_legs" class="block mb-2 text-sm font-medium text-gray-900">Short legs</label>
                                <input type="checkbox" name="short_legs" id="short_legs" {{ !$dog->short_legs ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="suppressed_tail" class="block mb-2 text-sm font-medium text-gray-900">Suppressed tail</label>
                                <input type="checkbox" name="suppressed_tail" id="suppressed_tail" {{ !$dog->suppressed_tail ?: 'checked' }}>
                            </div>
                            <div class="input">
                                <label for="temperament" class="block mb-2 text-sm font-medium text-gray-900" required>Temperament</label>
                                <input type="text" name="temperament" id="temperament" value="{{ old('temperament') == '' ? $dog->temperament : old('temperament') }}">
                            </div>
                            <div class="input">
                                <label for="weight_imperial" class="block mb-2 text-sm font-medium text-gray-900" required>Weight (eg. 12-14 lbs)</label>
                                <input type="text" name="weight_imperial" id="weight_imperial" value="{{ old('weight_imperial') == '' ? $dog->weight_imperial : old('weight_imperial') }}">
                            </div>
                            <div class="input">
                                <label for="wikipedia_url" class="block mb-2 text-sm font-medium text-gray-900" required>Wikipedia URL</label>
                                <input type="text" name="wikipedia_url" id="wikipedia_url" value="{{ old('wikipedia_url') == '' ? $dog->wikipedia_url : old('wikipedia_url') }}">
                            </div>
                            <div class="input">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900" required>Image (optional)</label>
                                <input type="file" name="image" id="image" value="{{ old('image') }}">
                                <br>
                                Current image:
                                @if($dog->image['url'] != null)
                                    <img src="{{ $dog->image['url'] }}"alt="A cute dog." class="h-full w-full object-cover object-center group-hover:opacity-75">   
                                @else
                                    No image!
                                @endif
                            </div>
                            

                        </div>
                        <button type="submit" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
    </div>


</x-app-layout>
