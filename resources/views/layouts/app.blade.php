<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Farm') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://dashboard-tailwindcomponents.netlify.app/assets/build/js/main.js?id=df2dfe6a4e2040ea9f2c"></script>
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="overflow-x-hidden">
    <div id="app">
       
        <vue-progress-bar></vue-progress-bar>
        <main>
           @yield('content')
        </main>
        <footer class="w-full text-center  p-4 pin-b bg-black">
            <p class="font-bold font-sans text-white">&copy; 2020 Farmerce. All Rights Reserved </p>
        </footer>
    </div>
   
</body>
</html>
