<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="relative">
    <div id="app">
        <div class="bg-teal-100 py-2">
            <header class="flex justify-between items-center container mx-auto">
                <a class="flex items-center" href="/">
                    <span class="fa fa-leaf text-teal-500 mr-2" style="font-size: 25px" aria-hidden="true"></span>
                    <h1 class="font-medium text-2xl font-serif text-teal-800">
                        tweeta
                    </h1>
                </a>
                @auth
                    <vue-notification></vue-notification>
                @endauth
            </header>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
