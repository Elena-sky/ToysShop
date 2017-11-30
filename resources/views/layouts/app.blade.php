<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" rel="stylesheet">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/heroic-features.css" rel="stylesheet">

    {{--<!-- Bootstrap core JavaScript -->--}}
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <link href="/css/shop-php.css" rel="stylesheet">
    <script src="/js/script.js"></script>


</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @foreach(\App\Categories::all() as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="/category/{{$category->id}}">{{$category->name}}</a>
                    </li>
                    <div></div>
                @endforeach;

                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">(
                        <span class="count"> {{Cart::instance('shoppingCart')->count()}}</span>)
                        Корзина -
                        <span class="badge badge-warning total">{{Cart::instance('shoppingCart')->total()}} грн</span>
                    </a>
                </li>
                <ul class="nav navbar-nav ml-auto">

                    @if (Auth::guest())
                        <li class="nav-item" style="display: -webkit-box;">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item" style="display: -webkit-box;">
                            <a class="nav-link" href="{{ route('register') }}">Зарегистрироватся</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }}
                                {{--<span class="caret"></span>--}}
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>


            </ul>
        </div>

        <style type="text/css">

        </style>


    </div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
