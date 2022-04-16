<table class="table table-bordered table-hover">
    <thead>
        <th> @sortablelink('title', 'Title')</th>
        <th>@sortablelink('author','Author')</th>
        <th>Description</th>
        <th>@sortablelink('released_at', 'Released At')</th>
        <th>@sortablelink('pages','Pages')</th>
        <th>@sortablelink('in_stock','In Stock')</th>
    </thead>
    <tbody>
        @if ($books->count() == 0)
        <tr>
            <td colspan="5">No Books to display.</td>
        </tr>
        @endif

        @foreach ($books as $book)
        <tr>
            <td><a href='book/{{$book->id}}' >{{ $book->title }}</a></td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->released_at }}</td>
            <td>{{ $book->pages }}</td>
            <td>{{ $book->in_stock }}</td </tr>
            @endforeach
    </tbody>
</table>