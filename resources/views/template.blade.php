<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
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
                <li class="nav-item" style="display: -webkit-box;">
                    <a class="nav-link" href="/login">Войти</a> или <a class="nav-link" href="/register">Зарегистрироватся</a>
                </li>
            </ul>
        </div>

        <style type="text/css">
            .dropdown {
                display: none;
                position: absolute;
                z-index: 9000;
            }

            .dropdown.dropdown-menu {
                top: auto;
                left: auto;
            }

            .dropdown.open {
                display: inherit;
            }
        </style>

        {{--<div dropdown>--}}
        {{--<button class="btn btn-default dropdown-open">Open</button>--}}
        {{--<ul class="dropdown dropdown-menu">--}}
        {{--<li><a ng-click="">Item #1</a></li>--}}
        {{--<li><a ng-click="">Item #2</a></li>--}}
        {{--<li><a ng-click="">Item #3</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}

        {{--<script type="text/javascript">--}}
        {{--App.directive("dropdown", function() {--}}
        {{--return {--}}
        {{--restrict: "A",--}}
        {{--link: function(scope, element, attrs) {--}}
        {{--var m = angular.element(element.findClass("dropdown")[0]);--}}
        {{--var t = angular.element(element.findClass("dropdown-open")[0]);--}}
        {{--var b = angular.element(document.getElementsByTagName("body"));--}}
        {{--t.on("click", function(e) {--}}
        {{--console.log("click!");--}}
        {{--var c = function(e) {--}}
        {{--if(m.hasClass("open")) {--}}
        {{--m.removeClass("open");--}}
        {{--t.removeClass("active");--}}
        {{--b.unbind("click", c);--}}
        {{--} else {--}}
        {{--m.addClass("open");--}}
        {{--t.addClass("active");--}}
        {{--}--}}
        {{--}--}}
        {{--if(!m.hasClass("open"))--}}
        {{--b.bind("click", c);--}}
        {{--});--}}
        {{--}--}}
        {{--};--}}
        {{--});--}}
        {{--</script>--}}
        {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
        {{--<!-- Left Side Of Navbar -->--}}
        {{--<ul class="nav navbar-nav">--}}
        {{--&nbsp;--}}
        {{--</ul>--}}

        {{--<!-- Right Side Of Navbar -->--}}
        {{--<ul class="nav navbar-nav navbar-right">--}}
        {{--<!-- Authentication Links -->--}}
        {{--@if (Auth::guest())--}}
        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
        {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
        {{--@else--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
        {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
        {{--</a>--}}

        {{--<ul class="dropdown-menu" role="menu">--}}
        {{--<li>--}}
        {{--<a href="{{ route('logout') }}"--}}
        {{--onclick="event.preventDefault();--}}
        {{--document.getElementById('logout-form').submit();">--}}
        {{--Logout--}}
        {{--</a>--}}

        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--{{ csrf_field() }}--}}
        {{--</form>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--@endif--}}
        {{--</ul>--}}
        {{--</div>--}}
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>


</body>

</html>