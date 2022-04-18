<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto">
                        <form action="" method="post">
                            @csrf
                            <div class="grid grid-cols-12 content-center gap-7">
                                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6 2xl:col-span-6">
                                    <x-label for="title" value="Title" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />

                                    <x-label for="author" value="Author" />
                                    <x-input id="author" class="block mt-1 w-full" type="text" name="author" required autofocus />

                                    <x-label for="released_at" value="Released At" />
                                    <x-input id="title" class="block mt-1 w-full" type="date" name="released_at" required autofocus />

                                    <x-label for="pages" value="Pages" />
                                    <x-input id="pages" class="block mt-1 w-full" type="number" name="pages" required autofocus />

                                    <x-label for="isbn" value="ISBN" />
                                    <x-input id="isbm" class="block mt-1 w-full" type="text" name="isbn" required autofocus />

                                    <x-label for="description" value="Description" />
                                    <x-textarea id="description" class="block mt-1 w-full" name="description" required autofocus rows="10" />
                                </div>
                                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-6 2xl:col-span-6">
                                    <x-label for="language_code" value="Language Code" />
                                    <x-input id="language_code" class="block mt-1 w-full" type="text" name="language_code" required autofocus />

                                    <x-label for="name" value="Genre" />
                                    <x-select name="genres[]" multiple required>
                                        @foreach ($genres as $genre)
                                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </x-select>

                                    <x-label for="in_stock" value="In Stock" />
                                    <x-input id="in_stock" class="block mt-1 w-full" type="text" name="in_stock" required autofocus />
                                </div>

                                <x-button class=""> Add </x-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>