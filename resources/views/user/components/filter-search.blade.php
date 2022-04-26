<div class="flex justify-between" mb-2>

    <form class="form-inline" method="GET">
        <div class="flex ">
            <x-select id="status" name="status" class="mx-4">
                <option value=''></option>
                <option value='pending'>Pending</option>
                <option value='in_time'>Accepted and in-time rentals</option>
                <option value='late_rentals'>Accepted late rentals</option>
                <option value='rejected'>Rejected rentals</option>
                <option value='returned'>Returned rentals</option>
            </x-select>
            <x-button type="submit" class=" mx-4">Filter</x-button>
        </div>
    </form>

</div>


</div>