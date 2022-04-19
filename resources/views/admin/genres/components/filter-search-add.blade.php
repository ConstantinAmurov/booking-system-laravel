<div class="flex justify-between" mb-2>

    <form class="form-inline" method="GET">
        <div class="flex ">
            <x-input type="text" id="filter" name="filter" placeholder="Genre" value="{{$filter}}" />
            <x-button type="submit" class=" mx-4">Filter</x-button>
        </div>
    </form>

    @if(Auth::user()->is_librarian)
    
    @if($mode=='view')

    <form method="POST" action="">
        @csrf
        <div class="flex">
            <x-input type="text" id="name" name="name" placeholder="Name of Genre" required />
            <x-select id="style" name="style" required class="mx-4">
                @foreach($styles as $style)
                <option value='{{$style}}'> {{$style}}</option>
                @endforeach
            </x-select>
            <x-button type="submit" class="">Add</x-button>

        </div>
    </form>

    @else

    <form method="POST" action="">
        @csrf
        <div class="flex">
            <x-input type="text" id="name" name="name" placeholder="Name of Genre" required value="{{$genre->name}}" />
            <x-select id="style" name="style" required class="mx-4">
                @foreach($styles as $style)
                @if($style == $genre->style)
                <option value='{{$style}}' selected> {{$style}}</option>
                @else
                <option value='{{$style}}'> {{$style}}</option>
                @endif
                @endforeach
            </x-select>
            <x-button type="submit" class="">
                @if($mode=='view')
                Add
                @else
                Edit
                @endif
            </x-button>

        </div>
    </form>
    @endif
    @endif

</div>