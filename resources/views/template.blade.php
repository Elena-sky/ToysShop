<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{--user--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Мир Игрушек</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/heroic-features.css" rel="stylesheet">
    <link href="/css/shop-php.css" rel="stylesheet">
    {{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" rel="stylesheet">--}}


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="position: fixed;">
    <div class="container">
        <a class="navbar-brand" href="#">Море Игрушек</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach(\App\Categories::where('status', 1)->get() as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="/category/{{$category->id}}">{{$category->name}}</a>
                    </li>
                    <div></div>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">(<span
                                class="count"> {{\App\Http\Controllers\CartController::kostilMeth('count')}}</span>)
                        Корзина -
                        <span class="badge badge-warning total">{{\App\Http\Controllers\CartController::kostilMeth('total')}}
                            грн</span>
                    </a>
                    {{--<a class="nav-link" href="/cart">(
                        <span class="count"> {{Cart::count()}}</span>)
                        Корзина -
                        <span class="badge badge-warning total">{{Cart::total()}} грн</span>
                    </a>--}}
                </li>

                    <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item" style="display: -webkit-box;">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item" style="display: -webkit-box;">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироватся</a>
                    </li>
                @else
                    <li class="nav-item dropdown" style="display: -webkit-box; position: relative;">


                        <a href="#" class=" nav-link dropdown-toggle" data-toggle="dropdown"
                           aria-expanded="false">{{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>


                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">Профиль</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Заказы</a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#">Смена пароля</a>
                            </li>

                            <div class="dropdown-divider"></div>


                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Выйти
                                </a>

                                <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}"
                                      method="POST" style="display: none;"> {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <div class="row" style="padding:20px 0px;padding-bottom: 25px; color: white">
            <section class="footer-block col-xs-12 col-sm-3">
                <div>
                    <h4>КОНТАКТЫ</h4>
                    <ul class="toggle-footer">
                        <li><span>Пн-пт. 8:00-20:00, <br>cб-вс 9:00-17:00</span></li>
                        <li><span>+38 (095) 0-333-333</span></li>
                        <li><span>+38 (093) 0-333-333</span></li>
                        <li><span>+38 (097) 0-333-333</span></li>
                        <li><span>office@moreigrushek.ua</span></li>

                    </ul>
                </div>

            </section>
            <section class="footer-block col-xs-12 col-sm-3"></section>
            <section class="footer-block col-xs-12 col-sm-3">
                <div>
                    <h4>МЫ В СОЦСЕТЯХ</h4>
                    <ul class="toggle-footer clearfix">
                        <li><a class="btn btn-social-icon btn-lg btn-facebook">
                                <span class="fa fa-vk"></span>
                            </a></li>
                        <li></li>
                    </ul>
                </div>
            </section>
            <section class="footer-block col-xs-12 col-sm-3"></section>
        </div>

        <div style="text-align:center; !important"><p class="m-0 text-center text-white">Copyright &copy; Your Website
                2017</p>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="/js/script.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>


    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>--}}

</footer>


</body>

</html>