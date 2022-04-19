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
                                <img src="https://media.istockphoto.com/vectors/default-avatar-photo-placeholder-icon-grey-profile-picture-business-vector-id1327592506?k=20&m=1327592506&s=612x612&w=0&h=hgMOPfz7H-CYP_CQ0wbv3IwRkbQna32xWUPoXtMyg5M=" alt="">
                            </div>
                            <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-8 2xl:col-span-8">
                                <h1 class="text-3xl font-bold"> {{Auth::user()->name}}</h1>
                                <h2 class="text-2xl my-4">{{Auth::user()->email}}</h2>

                                <p class="text my-4 ">Role : @if(Auth::user()->is_librarian) librarian @else @endif</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>