<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Minha App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-normal">
    @include('header')
    <main>
        <x-container>
            <x-page-title>
                @yield('page-title')
            </x-page-title>

            <hr class="my-2 text-gray-300" />

            @yield('content')
        </x-container>
    </main>
</body>

</html>
