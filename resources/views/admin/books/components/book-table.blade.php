<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-3">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('title','Title')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('author','Author')
            </th>
            <th scope="col" class="px-6 py-3">
                Description
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('released_at', 'Released At')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('pages','Pages')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('in_stock','In Stock')
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($books->count() == 0)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td colspan="5">No Books to display.</td>
        </tr>
        @endif

        @foreach ($books as $book)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                <a href='book/{{$book->id}}'>{{ $book->title }}</a></td>
            <td class="px-6 py-4">{{ $book->author }}</>
            <td class="px-6 py-4 overflow-hidden max-w-lg text-ellipsis whitespace-nowrap">{{ $book->description }}</>
            <td class="px-6 py-4">{{ $book->released_at }}</>
            <td class="px-6 py-4">{{ $book->pages }}</>
            <td class="px-6 py-4">{{ $book->in_stock }}</ </tr>
                @endforeach
    </tbody>
</table>

{!! $books->appends(Request::except('page'))->render() !!}
<p>
    Displaying {{$books->count()}} of {{ $books->total() }} books(s).
</p>