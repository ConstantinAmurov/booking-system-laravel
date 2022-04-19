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
                @sortablelink('request_managed_by','Request Managed By ( Id )')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('returned_at','Returned at')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('status','Status')
            </th>
            <th scope="col" class="px-6 py-3">
                @sortablelink('deadline','Deadline')
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
            <td class="px-6 py-4"> {{ $borrow->book_id }}</td>

            @if($borrow->request_managed_by)
            <td class="px-6 py-4"> {{ $borrow->request_managed_by }}</td>
            @else
            <td class="px-6 py-4">Not managed yet</td>
            @endif

            @if($borrow->returned_at)
            <td class="px-6 py-4"> {{ $borrow->returned_at }}</td>
            @else
            <td class="px-6 py-4">Not returned yet</td>
            @endif


            <td class="px-6 py-4"> {{ $borrow->status }}</td>

            @if($borrow->deadline)
            <td class="px-6 py-4"> {{ $borrow->deadline }}</td>
            @else
            <td class="px-6 py-4">No deadline yet</td>
            @endif


            <td>
                <div class="flex h-7">

                    @if($borrow->status==='PENDING')
                    <form class="flex" action="/rental/{{$borrow->id}}/accept" method="POST">
                        @csrf
                        <x-input id="deadline" class="" type="date" name="deadline" required autofocus />
                        <button type="submit" class="px-4 py-1 rounded-md bg-green-500 hover:bg-green-600 hover:shadow-sm ml-4 text-white"> Accept</button>
                    </form>
                    @endif

                    @if($borrow->status=='ACCEPTED')
                    <form action="/rental/{{$borrow->id}}/return" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-1 rounded-md bg-gray-700 hover:bg-gray-900 hover:shadow-sm ml-4 text-white"> Return</button>
                    </form>
                    @endif
                    @if($borrow->status!='REJECTED')
                    <form action="/rental/{{$borrow->id}}/reject" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="px-4 py-1 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-sm ml-4 text-white"> Reject</button>
                    </form>
                    @endif
                </div>
            </td>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $borrows->appends(Request::except('page'))->render() !!}
<p>
    Displaying {{$borrows->count()}} of {{ $borrows->total() }} borrows(s).
</p>