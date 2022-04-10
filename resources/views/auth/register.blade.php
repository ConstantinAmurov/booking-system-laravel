@extends('layouts.app')


@section('form')

<div class="container">
    <div class="text-4xl text-center ">
        <h1 class="mb-3">Sign in to</h1>
        <h1 class='font-bold'>BOOK RENTAL <span class="font-light">SYSTEM</span></h1>
    </div>

    <form class="text-xl mt-10" action="">
        <label class="block mb-10">
            <span class="text-gray-700">Name</span>
            <input type="text" class="form-input mt-1 block w-full bg-gray-200 rounded-lg h-12 p-4" placeholder="Your Name">
        </label>
        <label class="block mb-10">
            <span class="text-gray-700">E-mail</span>
            <input type="email" class="form-input mt-1 block w-full bg-gray-200 rounded-lg h-12 p-4" placeholder="john@example.com">
        </label>
        <label class="block mb-10">
            <span class="text-gray-700">Password</span>
            <input type="password" class="form-input mt-1 block w-full bg-gray-200 rounded-lg h-12 p-4" placeholder="*****">
        </label>
        <label class="block">
            <span class="text-gray-700">Repeat Password</span>
            <input type="password" class="form-input mt-1 block w-full bg-gray-200 rounded-lg h-12 p-4" placeholder="*****">
        </label>
        <div class="mt-20 flex justify-between">
            <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbox h-6 w-6 border-2 border-blue-500 rounded-md">
                <span class="ml-2">Remember me</span>
            </label>
            <a href="{{url("/login/")}}"> Have an account?</a>
        </div>

        <button type="submit" class="w-100 h-12 mt-10 rounded-lg bg-blue-500 text-center text-white hover:bg-blue-600">Sign up</button>
    </form>

</div>

@stop