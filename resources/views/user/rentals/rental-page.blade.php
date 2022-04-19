<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-12 content-center gap-7">
                            <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
                                <img src="{{$book->cover_image}}" alt="">
                            </div>
                            <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-8 2xl:col-span-8">
                                <h1 class="text-3xl font-bold"> {{$book->title}}</h1>
                                <h2 class="text-2xl my-4">{{$book->author}}</h2>
                                <p class="text my-4">{{$book-> description}}</p>

                                <div class="grid grid-cols-12 content-center gap-7">
                                    <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-4 xl:col-span-4 2xl:col-span-4 font-extrabold">
                                        <p>STATUS</p>
                                        <p>REQUEST PROCESSED AT</p>
                                        <p>RETURN MANAGED BY</p>
                                        <p>DEADLINE</p>
                                        <p>RETURNED AT</p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 md:col-span-8 lg:col-span-8  xl:col-span-8 2xl:col-span-8 ">
                                        <p>{{$borrow->status}}</p>

                                        @if($borrow->request_processed_at)
                                        <p>{{$borrow->request_processed_at}}</p>
                                        @else
                                        <p>No yet processed</p>
                                        @endif

                                        @if($borrow->return_managed_by)
                                        <p>{{$borrow->return_managed_by}}</p>
                                        @else
                                        <p>Not yet managed</p>
                                        @endif

                                        @if($borrow->deadline)
                                        <p>{{$borrow->deadline}}</p>
                                        @else
                                        <p>Not deadline yet</p>
                                        @endif

                                        @if($borrow->returned_at)
                                        <p>{{$borrow->returned_at}}</p>
                                        @else
                                        <p>Not yet returned</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>