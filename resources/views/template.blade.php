<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Toy shop">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

    {{--user--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}


    <title>
        Море Игрушек
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{ asset("css/1/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ asset("css/1/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/1/animate.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/1/owl.carousel.css") }}" rel="stylesheet">
    <link href="{{ asset("css/1/owl.theme.css") }}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{ asset("css/1/style.default.css") }}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{ asset("css/1/custom.css") }}" rel="stylesheet">

    <script src=""{{ asset("js/1/respond.min.js") }}></script>

    <link rel="stylesheet"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css"
          type="text/css"/>


</head>

<body>

<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown"></div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @if (Auth::guest())

                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Войти</a>
                </li>
                    <li><a href="{{ route('register') }}">Зарегистрироватся</a>
                </li>
                @else
                    <li><a href="#">{{ Auth::user()->name }}</a>
                    </li>
                    @role('Admin') {{-- Laravel-permission blade helper --}}
                    <li><a href="{{route('adminPageView')}}"><i class="fa fa-btn fa-unlock"></i>Admin</a>
                    </li>
                    @endrole
                    <li><a href="{{ route('profile') }}">Профиль</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}"
                              method="POST"> {{ csrf_field() }}
                        </form>
                    </li>

                @endif


                <li><a href="{{ route('contact') }}">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Вход в аккаунт</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" id="email" placeholder="email"
                                   name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" id="password" placeholder="password"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Войти</button>
                        </p>

                        <p class="text-center text-muted">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Забыли пароль?
                            </a>
                        </p>

                    </form>

                    <p class="text-center text-muted">Не зарегестрированны еще?</p>
                    <p class="text-center text-muted"><a href="{{ route('register') }}"><strong>Зарегестрируйтесь
                                сейчас</strong></a>!
                        It is
                        easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{route('index')}}" data-animate-hover="bounce">
                <img src="{{ asset("img/logo.png") }}" alt="Obaju logo" class="hidden-xs">
                <img src="{{ asset("img/logo-small.png") }}" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">--}}
                {{--<span class="sr-only">Toggle search</span>--}}
                {{--<i class="fa fa-search"></i>--}}
                {{--</button>--}}
                <a class="btn btn-default navbar-toggle" href="{{route('cartView')}}">
                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> {{Cart::count()}}
                        товар(ов) в корзине</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="{{route('index')}}">Главная</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Категории
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">

                                        <h5>Игрушки</h5>
                                        <ul>
                                            @foreach(\App\Categories::where('status', 1)->get() as $category)
                                                <li><a href="/category/{{$category->id}}">{{$category->name}}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">


            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="/cart" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span
                            class="hidden-sm">{{Cart::count()}} товар(ов) в корзине</span></a>
            </div>
            <!--/.nav-collapse -->


            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <div class="input-group">
                    {{ Form::open(['action' => ['SearchController@autocomplete'], 'method' => 'GET', 'class' => 'navbar-form']) }}
                    {{ Form::text('term', '', ['id' =>  'q', 'placeholder' =>  'Поиск...', 'class' => 'form-control mr-sm-2'])}}
                    {{ Form::close() }}

                </div>
            </div>

        </div>

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->

@if(Session::has('flash_message'))
    <div class="container">
        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @include ('errors.list') {{-- Including error file --}}
    </div>
</div>

@yield('content')


<!-- *** FOOTER ***
    _________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Страницы</h4>

                <ul>
                    <li><a href="{{route('cartView')}}">Корзина</a>
                    </li>
                    <li><a href="{{route('register')}}">Регистрация</a>
                    </li>
                    <li><a href="{{route('login')}}">Вход</a>
                    </li>
                    <li><a href="{{ route('contact') }}">Контакты</a>
                    </li>
                </ul>

                <hr>


                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

                <h4>Toп категорий</h4>

                <ul>
                    @foreach(\App\Categories::where('status', 1)->get() as $category)
                        <li><a href="/category/{{$category->id}}">{{$category->name}}</a>
                        </li>
                    @endforeach

                </ul>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Где найти нас</h4>

                <p><strong>Одесса</strong>
                    <br>Одеська область
                    <br>проспект Добровольського
                    <br>114/2
                    <br>Северный рынок
                    <br>
                    <strong>Контейнер №Г14</strong>
                </p>

                <a href="{{ route('contact') }}">Перейти на страницу контактов</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external" data-animate-hover="shake"><i
                                class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->


<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© 2018 Alena Soroka.</p>

        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->


</div>
<!-- /#all -->


<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="{{ asset("js/1/jquery-1.11.0.min.js") }}"></script>
<script src="{{ asset("js/1/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/1/jquery.cookie.js") }}"></script>
<script src="{{ asset("js/1/waypoints.min.js") }}"></script>
<script src="{{ asset("js/1/modernizr.js") }}"></script>
<script src="{{ asset("js/1/bootstrap-hover-dropdown.js") }}"></script>
<script src="{{ asset("js/1/owl.carousel.min.js") }}"></script>
<script src="{{ asset("js/1/front.js") }}"></script>

<script src="{{ asset("/js/script.js") }}"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script id="dsq-count-scr" src="//webshop1.disqus.com/count.js" async></script>


</body>

</html>
