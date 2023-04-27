
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Block Factory') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">
                    <img src="https://cdn.idealo.com/folder/Product/2790/1/2790183/s11_produktbild_gross/lego-bloque-de-almacenaje-2-x-2.jpg" class=" " alt="" width="30" height="24">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Block Factory') }}
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">@lang('messages.productos')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.index') }}">@lang('messages.categorias')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('carro.index') }}">@lang('messages.carro')</a>
                        </li>                      
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __("Escoge lenguage") }}
                            </a>

                            

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('set_language', ['es'])}}">{{ __("Spanish") }}</a>
                                    <a class="dropdown-item" href="{{route('set_language', ['en'])}}">{{ __("English") }}</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                

                                <a class="dropdown-item" href="{{ route('NewPassword') }}">
                                       @lang('messages.perfil')
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('messages.out')
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </a>
            </div>
            
        </nav>

        <main class="py-4 bg-yellow">
            @yield('content')
        </main>
    </div>
</body>

</html>

