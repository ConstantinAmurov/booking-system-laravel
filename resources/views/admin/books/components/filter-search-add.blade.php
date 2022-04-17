<div class="flex justify-between">

    <form class="form-inline" method="GET">
        <div class="flex mb-2">
            <x-input type="text" id="filter" name="filter" placeholder="Book Title or Author" value="{{$filter}}" />
            <x-button type="submit" class=" mx-4">Filter</x-button>
        </div>
    </form>
            <a href="book/create"><x-button class=" mx-4">Add</x-button></a>
</div>