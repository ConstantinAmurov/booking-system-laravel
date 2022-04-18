<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-3">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('reader_id','Reader Id')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('book_id','Book Id')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('status','Status')
            </th>
            <th scope="col" class="px-6 py-3">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($borrows->count() == 0)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td colspan="5">No Rentals to display.</td>
        </tr>
        @endif

        @foreach ($borrows as $borrow)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                {{ $borrow->reader_id }}
            </th>
            <td class="px-6 py-4">   {{ $borrow->book_id }}</td>
            <td class="px-6 py-4">   {{ $borrow->status }}</td>
            <td>
                <a class="px-4 py-1 rounded-md bg-gray-100 hover:bg-gray-200 hover:shadow-sm" href="/rental/{{$borrow->id}}/edit">Edit</a>
                <form style="display:inline-block" action="/rental/{{$borrow->id}}/delete" method="POST">
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

{!! $borrows->appends(Request::except('page'))->render() !!}
<p>
    Displaying {{$borrows->count()}} of {{ $borrows->total() }} genres(s).
</p>