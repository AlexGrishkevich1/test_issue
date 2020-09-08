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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
    <div id="app">
        <nav class="sidebar collapse d-md-block float-left w-10 h-100  w-25 position-fixed z-index" id="sidebar" style="z-index: 9999">
            <div class="sidebarSticky h-100 bg-light border">
                <div class="list-group list-group-flush">

                    @include('layouts.partials.menu')

                </div>
            </div>
        </nav>

        <main role="main" class="mainContent flex-shrink-0 float-right w-75">
            @yield('content')
            <products-component :filter-prop="filter"></products-component>
        </main>
    </div>
</body>
</html>
