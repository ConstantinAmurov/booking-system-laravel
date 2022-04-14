<div class="container mx-auto">
    <div class="grid grid-cols-12 content-center gap-7">
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between  text-3xl"><span>Number of Users</span> <span class="font-extrabold">{{$usersCount}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
            <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between  text-3xl"><span>Number of Books</span> <span class="font-extrabold">{{$booksCount}}</span></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between  text-3xl"><span>Number of Genres</span> <span class="font-extrabold">{{$genresCount}}</span></div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col text-3xl"><span>Genres List</span>
                        <div class="mx-auto mt-10">
                            <ol class="list-decimal">
                                @foreach($genres as $genre)
                                <li><a href='genre/{{$genre->id}}' class="">{{$genre->name}}</a> </li>
                                @endforeach
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between  text-3xl"><span>Number of Active Book Rentals</span> <span class="font-extrabold">{{$activeBooksCount}}</span></div>
                </div>
            </div>
        </div>

    </div>
</div>