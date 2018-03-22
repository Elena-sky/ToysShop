<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Админ - Мир Игрушек</title>

    <!-- Bootstrap core CSS-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <link href="/css/style-admin.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('index')}}">Мир Игрушек</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Админ-панель">
                <a class="nav-link" href="{{route('adminPageView')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Админ-панель</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Заказы">
                <a class="nav-link" href="{{route('viewAllOrders')}}">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                    <span class="nav-link-text">Заказы</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Управление товарами">
                <a class="nav-link" href="{{route('productView')}}">
                    <i class="fa fa-fw fa-list-alt"></i>
                    <span class="nav-link-text">Управление товарами</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Управление категориями">
                <a class="nav-link" href="{{route('viewCategory')}}">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Управление категориями</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Управление слайдерами">
                <a class="nav-link" href="{{route('viewSliders')}}">
                    <i class="fa  fa-fw fa-picture-o"></i>
                    <span class="nav-link-text">Управление слайдерами</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Содержимое сайта">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdmin"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Управление доступом</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseAdmin">
                    <li>
                        <a class="nav-link" href="{{route('viewUsers')}}">
                            <i class="fa fa-users"></i>
                            <span class="nav-link-text">Управление пользователями</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('rolesView')}}">
                            <i class="fa fa-id-card"></i>
                            <span class="nav-link-text">Управление ролями</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('permissionsView')}}">
                            <i class="fa fa-key"></i>
                            <span class="nav-link-text">Управление разрешениями</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link">
                    Ваша роль - {{(Auth::user())->roles()->pluck('name')->implode(' ')}}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i> Выйти</a>
            </li>
        </ul>
    </div>
</nav>

<div class="content-wrapper">

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


<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Готов уходить?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Выберите «Выход» ниже, если вы готовы завершить текущий сеанс.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>

                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> Выйти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST"> {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2017</small>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="/js/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="/js/Chart.min.js"></script>
        <script src="/js/jquery.dataTables.js"></script>
        <script src="/js/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="/js/sb-admin-datatables.min.js"></script>
        <script src="/js/sb-admin-charts.min.js"></script>

        <!-- button product of orders plus and minus-->
        <script src="/js/ordersButton.js"></script>
        <script src="/js/admin-search.js"></script>


        {{--TEST--}}



    </footer>
</div>


<!-- Footer -->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © 2018 Alena Soroka</small>
        </div>
    </div>


</footer>
</body>

</html>
