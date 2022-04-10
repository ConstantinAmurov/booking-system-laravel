<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="bg-blue-600 w-full h-40 rounded-b-2xl flex p-10">
        <h1 class="my-auto text-white font-bold text-4xl">BOOK RENTAL <span class="font-light">SYSTEM</span></h1>
    </div>
    <div class="container bg-white rounded-2xl relative -top-10 ">
        <div class="row">
            <div class="col pl-0">
                <img class=" rounded-tl-2xl rounded-bl-2xl min-h-full object-cover" src="{{ asset('img/abstract.jpg') }}" alt="abstract background">
            </div>
            <div class="col my-12"> @yield('form')</div>
        </div>
</body>

</html>