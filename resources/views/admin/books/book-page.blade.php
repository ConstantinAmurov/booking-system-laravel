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
                        <div class="grid grid-cols-12 content-center gap-7">
                            <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
                                <img src="https://media.istockphoto.com/photos/blank-book-cover-isolated-on-white-picture-id478720334?k=20&m=478720334&s=612x612&w=0&h=iWtL-5Zqgoxq8GDq13szDN3i9CZjSE1oaOYkdDuG63Q=" alt="">
                            </div>
                            <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-8 2xl:col-span-8">
                                <h1 class="text-3xl font-bold"> {{$book->title}}</h1>
                                <h2 class="text-2xl my-4">{{$book->author}}</h2>
                                <p class="text my-4">{{$book-> description}}</p>

                                <div class="grid grid-cols-12 content-center gap-7">
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4 font-extrabold">
                                        <p>GENRES</p>
                                        <p>DATE OF PUBLISH</p>
                                        <p>PAGES</p>
                                        <p>LANGUAGE</p>
                                        <p>ISBN NUMBER</p>
                                        <p>AVAILABLE BOOKS</p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-8 lg:col-span-8  xl:col-span-8 2xl:col-span-8 ">
                                        <p>
                                            @foreach($book->genres as $genre)
                                            @if($loop->last)
                                            {{$genre->name}}
                                            @else
                                            {{$genre->name}},
                                            @endif
                                            @endforeach
                                        </p>
                                        <p>{{$book->released_at}}</p>
                                        <p>{{$book->pages}}</p>
                                        <p>{{$book->language_code}}</p>
                                        <p>{{$book->isbn}}</p>
                                        <p>{{$book->in_stock}}</p>
                                    </div>
                                </div>
                                <div class="flex my-7">
                                    @if(Auth::user()->is_librarian)

                                    <a class="px-4 py-1 rounded-md bg-gray-100 hover:bg-gray-200 hover:shadow-sm" href="edit/{{ $book->id }}">Edit</a>

                                    <form style="display:inline-block" action="{{ $book->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="px-4 py-1 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-sm ml-4 text-white">Delete</button>
                                    </form>

                                    @elseif ($book->in_stock>1 && $userCanBorrow)
                                    <form style="display:inline-block" action="{{$book->id}}/borrow" method="POST">
                                        @csrf
                                        <button class="px-4 py-1 rounded-md bg-gray-100 hover:bg-gray-200 hover:shadow-sm">Borrow a book</button>
                                    </form>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>