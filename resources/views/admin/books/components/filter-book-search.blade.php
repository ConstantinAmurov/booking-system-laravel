<form class="form-inline" method="GET">
    <div class="form-group mb-2">
        <label for="filter" class="col-sm-2 col-form-label">Filter</label>
        <input type="text" class="form-control" id="filter" name="filter" placeholder="Book Title or Author" value="{{$filter}}">
    </div>
    <button type="submit" class="btn btn-default mb-2">Filter</button>
</form>