<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new dog to database') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{url('add-dog')}}" method="POST">
                    @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div class="input">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="input">
                                <label for="alt_names" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alternative names</label>
                                <input type="text" name="alt_names" id="alt_names">
                            </div>
                            <div class="input">
                                <label for="experimental" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experimental</label>
                                <input type="checkbox" name="experimental" id="experimental">
                            </div>
                            <div class="input">
                                <label for="hairless" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hairless</label>
                                <input type="checkbox" name="hairless" id="hairless">
                            </div>
                            <div class="input">
                                <label for="hypoallergenic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hypoallergenic</label>
                                <input type="checkbox" name="hypoallergenic" id="hypoallergenic">
                            </div>
                            <div class="input">
                                <label for="life_span" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lifespan (eg. 12-14)</label>
                                <input type="text" name="life_span" id="life_span">
                            </div>
                            <div class="input">
                                <label for="natural" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Natural</label>
                                <input type="checkbox" name="natural" id="natural">
                            </div>
                            <div class="input">
                                <label for="origin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origin</label>
                                <input type="text" name="origin" id="origin">
                            </div>
                            <div class="input">
                                <label for="rare" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rare</label>
                                <input type="checkbox" name="Rare" id="Rare">
                            </div>
                            <div class="input">
                                <label for="rex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rex</label>
                                <input type="checkbox" name="rex" id="rex">
                            </div>
                            <div class="input">
                                <label for="short_legs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short legs</label>
                                <input type="checkbox" name="short_legs" id="short_legs">
                            </div>
                            <div class="input">
                                <label for="suppressed_tail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suppressed tail</label>
                                <input type="checkbox" name="suppressed_tail" id="suppressed_tail">
                            </div>
                            <div class="input">
                                <label for="temperament" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Temperament</label>
                                <input type="text" name="temperament" id="temperament">
                            </div>
                            <div class="input">
                                <label for="weight_imperial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight (eg. 12-14)</label>
                                <input type="text" name="weight_imperial" id="weight_imperial">
                            </div>
                            <div class="input">
                                <label for="wikipedia_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wikipedia URL</label>
                                <input type="text" name="wikipedia_url" id="wikipedia_url">
                            </div>
                        </div>
                        <button type="submit" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
