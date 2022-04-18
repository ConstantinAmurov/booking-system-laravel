<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-3">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('name','Name')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('style','Style')
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($genres->count() == 0)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td colspan="5">No Genres to display.</td>
        </tr>
        @endif

        @foreach ($genres as $genre)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                <a href='genre/{{$genre->id}}'>{{ $genre->name }}</a>
            </th>
            <td class="px-6 py-4">{{ $genre->style }}</td>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $genres->appends(Request::except('page'))->render() !!}
<p>
    Displaying {{$genres->count()}} of {{ $genres->total() }} books(s).
</p>