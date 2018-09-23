<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.css') }}" rel="stylesheet">

    @yield('style')
</head>
<body>

    <div id="app">
        @yield('header')

        <main>
            @yield('content')
        </main>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>


    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}" defer></script>
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}" defer></script>

    <script src="{{ asset('js/creative.js') }}" defer></script>
</body>
</html>

