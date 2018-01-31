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
    <link href="css/1/font-awesome.css" rel="stylesheet">
    <link href="css/1/bootstrap.min.css" rel="stylesheet">
    <link href="css/1/animate.min.css" rel="stylesheet">
    <link href="css/1/owl.carousel.css" rel="stylesheet">
    <link href="css/1/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/1/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/1/custom.css" rel="stylesheet">

    <script src="js/1/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">


</head>

<body>

<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a> <a href="#">Get
                flat 35% off on orders over $50!</a>
        </div>
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
                    <li><a href="{{ route('profile') }}">Профиль</a>
                    </li>
                    <li><a href="{{ route('viewOldOrders') }}">Заказы</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Выйти
                        </a>

                        <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}"
                              method="POST" style="display: none;"> {{ csrf_field() }}
                        </form>
                    </li>

                @endif


                <li><a href="contact.html">Contact</a>
                </li>
                <li><a href="#">Recently viewed</a>
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

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                                </label>
                            </div>
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

            <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">3 items in cart</span>
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


                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Template
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Shop</h5>
                                        <ul>
                                            <li><a href="index.html">Homepage</a>
                                            </li>
                                            <li><a href="category.html">Category - sidebar left</a>
                                            </li>
                                            <li><a href="category-right.html">Category - sidebar right</a>
                                            </li>
                                            <li><a href="category-full.html">Category - full width</a>
                                            </li>
                                            <li><a href="detail.html">Product detail</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>User</h5>
                                        <ul>
                                            <li><a href="register.html">Register / login</a>
                                            </li>
                                            <li><a href="customer-orders.html">Orders history</a>
                                            </li>
                                            <li><a href="customer-order.html">Order history detail</a>
                                            </li>
                                            <li><a href="customer-wishlist.html">Wishlist</a>
                                            </li>
                                            <li><a href="customer-account.html">Customer account / change password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Order process</h5>
                                        <ul>
                                            <li><a href="basket.html">Shopping cart</a>
                                            </li>
                                            <li><a href="checkout1.html">Checkout - step 1</a>
                                            </li>
                                            <li><a href="checkout2.html">Checkout - step 2</a>
                                            </li>
                                            <li><a href="checkout3.html">Checkout - step 3</a>
                                            </li>
                                            <li><a href="checkout4.html">Checkout - step 4</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Featured</h5>
                                        <ul>
                                            <li><a href="category.html">Trainers</a>
                                            </li>
                                            <li><a href="category.html">Sandals</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
                                        </ul>
                                        <h5>Looks and trends</h5>
                                        <ul>
                                            <li><a href="category.html">Trainers</a>
                                            </li>
                                            <li><a href="category.html">Sandals</a>
                                            </li>
                                            <li><a href="category.html">Hiking shoes</a>
                                            </li>
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
                            class="hidden-sm">3 items in cart</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">

                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            {{--{{ Form::open(['action' => ['SearchController@autocomplete'], 'method' => 'GET']) }}--}}
            {{--{{ Form::text('term', '', ['id' =>  'q', 'placeholder' =>  'Поиск', 'class' => 'form-control mr-sm-2'])}}--}}
            {{--{{ Form::close() }}--}}

            {{--нужно подключить     /js/script.js--}}


            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->


@yield('content')


<!-- *** FOOTER ***
    _________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="text.html">About us</a>
                    </li>
                    <li><a href="text.html">Terms and conditions</a>
                    </li>
                    <li><a href="faq.html">FAQ</a>
                    </li>
                    <li><a href="contact.html">Contact us</a>
                    </li>
                </ul>

                <hr>

                <h4>User section</h4>

                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.html">Regiter</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Top categories</h4>

                <h5>Men</h5>

                <ul>
                    <li><a href="category.html">T-shirts</a>
                    </li>
                    <li><a href="category.html">Shirts</a>
                    </li>
                    <li><a href="category.html">Accessories</a>
                    </li>
                </ul>

                <h5>Ladies</h5>
                <ul>
                    <li><a href="category.html">T-shirts</a>
                    </li>
                    <li><a href="category.html">Skirts</a>
                    </li>
                    <li><a href="category.html">Pants</a>
                    </li>
                    <li><a href="category.html">Accessories</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Where to find us</h4>

                <p><strong>Obaju Ltd.</strong>
                    <br>13/25 New Avenue
                    <br>New Heaven
                    <br>45Y 73J
                    <br>England
                    <br>
                    <strong>Great Britain</strong>
                </p>

                <a href="contact.html">Go to contact page</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->


            <div class="col-md-3 col-sm-6">

                <h4>Get the news</h4>

                <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                    turpis egestas.</p>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                        <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                    </div>
                    <!-- /input-group -->
                </form>

                <hr>

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
            <p class="pull-left">© 2015 Your name goes here.</p>

        </div>
        <div class="col-md-6">
            <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a>
                & <a href="https://fity.cz">Fity</a>
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->


</div>
<!-- /#all -->


<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="js/1/jquery-1.11.0.min.js"></script>
<script src="js/1/bootstrap.min.js"></script>
<script src="js/1/jquery.cookie.js"></script>
<script src="js/1/waypoints.min.js"></script>
<script src="js/1/modernizr.js"></script>
<script src="js/1/bootstrap-hover-dropdown.js"></script>
<script src="js/1/owl.carousel.min.js"></script>
<script src="js/1/front.js"></script>


</body>

</html>
