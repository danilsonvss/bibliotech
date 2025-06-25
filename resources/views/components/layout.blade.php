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
    <title>{{ $title ?? 'Minha App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-normal">
    <x-navigation.header />

    <main>
        <x-container>
            @isset($pageTitle)
                <x-pages.page-title>
                    {{ $pageTitle }}
                </x-pages.page-title>
            @endisset

            <x-pages.page-divider />

            {{ $slot }}
        </x-container>

        <x-alerts.toast />
    </main>
</body>

</html>
