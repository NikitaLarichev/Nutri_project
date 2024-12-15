

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net"/>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Nunito&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @livewireStyles
    <!-- Scripts -->

</head>

<body class="c1 first">
    <div class="second" id="app">
        <nav id="nav" class="navbar navbar-expand-md fixed-top navbar-light ms-hcolor shadow-sm">
            <div class="container text-dark">
                <div id="headerNameBlock">
                    <div id="headerName"><a id="lname">Ларичева </a><a id="fname">Екатерина</a></div>
                    <div class="headerProf">функциональный нутрициолог</div>
                    <div class="headerProf">клинический психолог</div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('products')}}">Услуги</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('about_me')}}">Обо мне</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('cases')}}">Отзывы</a></li>
                        @if(Auth::check())
                            @if(Auth::user()->role=="admin")
                                <li class="nav-item"><a class="nav-link" href="{{route('clients_list')}}">Клиенты</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('materials_storage')}}">Материалы</a></li>
                            @endif
                            @if(Auth::user()->role=="user")
                                <li class="nav-item"><a class="nav-link" href="{{route('account_nj')}}">Личный кабинет</a></li>
                            @endif
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{route('contacts')}}">Контакты</a></li>   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                                    <!-- <a class = "nav-link" style = "cursor : pointer" data-toggle = "modal" data-target = "#loginModal" > {{ __('Login') }} </a>   -->
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выход
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(Auth::check())
            @if(Auth::user()->isBlocked=="1")
                <p class = "text-danger text-center mt-4">Ваш аккаунт заблокирован!</p>
            @endif                
        @endif
        <main id="main" class="c1">
            @yield('content')
        </main>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
<footer id="footer">

</footer>
</html>
