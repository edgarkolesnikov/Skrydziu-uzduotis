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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    
</head>
<body style="">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
           
            <a class="navbar-brand" href="{{ route('home') }}">
                Home
            </a>

            @guest
                @if (Route::has('login'))
                        <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                        <a class="navbar-brand" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @endguest
            
            @if(Auth::user())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <a class="navbar-brand" href="{{ route('flight.list') }}"> Skrydziu sarasas </a>
                <a class="navbar-brand" href="{{ route('flight.create') }}"> Prideti skrydi </a>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    
                        <a class="navbar-brand" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
<footer>

</footer>
