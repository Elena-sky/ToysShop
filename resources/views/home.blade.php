@extends('template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#">Разделы личного кабинета
                            </a>
                        </h4>
                    </div>
                    <div class="panel-collapse">
                        <ul class="list-group list-unstyled">
                            <li class="list-group-item"><a href="{{ route('profile') }}">Личные даннные</a></li>
                            <li class="list-group-item"><a href="#">Заказы</a></li>
                            <li class="list-group-item"><a href="#">Закладки</a></li>
                            <li class="list-group-item"><a href="#">Вы смотрели</a></li>
                            <li class="list-group-item"><a href="#">Смена пароля</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            @yield('content.1')

            <div class="col-md-12 profile">

            </div>
        </div>
    </div>




    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>

@endsection
