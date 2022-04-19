<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-3">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

        <tr>
            <th scope="col" class="px-6 py-3">
                @sortablelink('getBookRelation.title','Title')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('request_processed_at','Request Processed At')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('status','Status')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('deadline','Deadline')
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
                <a href="rental/{{$borrow->getBookRelation->id}}"> {{ $borrow->getBookRelation->title }} </a>
            </th>
            <td class="px-6 py-4"> {{ $borrow->request_processed_at}}</td>
            <td class="px-6 py-4"> {{ $borrow->status}}</td>
            <td class="px-6 py-4"> {{ $borrow->deadline}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $borrows->appends(Request::except('page'))->render() !!}
<p>
    Displaying {{$borrows->count()}} of {{ $borrows->total() }} borrows(s).
</p>