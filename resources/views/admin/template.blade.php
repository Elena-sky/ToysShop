<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="navbar.html">Navbar</a>
                    </li>
                    <li>
                        <a href="cards.html">Cards</a>
                    </li>
                </ul>
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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2" id="ordersDropdown" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Заказы
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
                    <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">

                    <?$orders = App\Orders::where('is_new', '1')->get()?>
                    @if(isset($orders))
                        <h6 class="dropdown-header">Новые заказы:</h6>

                        @foreach(App\Orders::where('is_new', '1')->get() as $order)
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{route('viewOneOrder', [$order->id])}}">
                            <span class="text-success">
                                <strong><i class="fa fa-long-arrow-up fa-fw"></i>Заказ № {{$order->id}}</strong>
                            </span>
                                <span class="small float-right text-muted">{{$order->created_at}}</span>
                                <div class="dropdown-message small">Кликните для детального просмотра заказа.</div>

                                <div class="dropdown-message small">
                                    Комментарий: {{($order->user_coment)? $order->user_coment: "нету" }} <br>
                                    Статус: {{($order->status)? 'Обрабатываеться' : 'Обработан'}} <br>
                                    Оплата: {{($order->is_paid)? 'Оплачен' : 'Неоплачен'}}</div>
                            </a>
                            <div class="dropdown-divider"></div>

                        @endforeach

                        <a class="dropdown-item small" href="{{route('viewAllOrders')}}">Смотреть все заказы</a>

                    @endif

                </div>
            </li>

            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
