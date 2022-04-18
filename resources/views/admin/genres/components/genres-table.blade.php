<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-3">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('name','Name')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('style','Style')
            </th>
            <th scope="col" class="px-6 py-3">
                Actions
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
                {{ $genre->name }}
            </th>
            <td class="px-6 py-4">{{ $genre->style }}</td>
            <td>
                <a class="px-4 py-1 rounded-md bg-gray-100 hover:bg-gray-200 hover:shadow-sm" href="/genre/{{$genre->id}}/edit">Edit</a>
                <form style="display:inline-block" action="/genre/{{$genre->id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="px-4 py-1 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-sm ml-4 text-white"> Delete</button>
                </form>
            </td>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $genres->appends(Request::except('page'))->render() !!}
<p>
    Displaying {{$genres->count()}} of {{ $genres->total() }} genres(s).
</p>