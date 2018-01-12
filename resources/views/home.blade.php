@extends('template')

@section('content')

    <div class="container">
        <div class="row">

            {{--<div class="col-md-3">--}}
            {{--<h3><a href="#">Личный кабинет--}}
            {{--</a></h3>--}}
            {{--<div class="btn-group-vertical">--}}

            {{--<button type="button" class="btn btn-warning ">1</button>--}}
            {{--<button type="button" class="btn btn-warning ">2</button>--}}
            {{--<div class="btn-group">--}}
            {{--<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">--}}
            {{--3--}}
            {{--</button>--}}
            {{--<div class="dropdown-menu">--}}
            {{--<a class="dropdown-item" href="#">3.1</a>--}}
            {{--<a class="dropdown-item" href="#">3.2</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}



            {{--<span>Избранное</span>--}}
            {{--</a>--}}
            {{--<small>Информация о всех ваших заказах: номера, даты, состав заказов и их статусы.</small>--}}

            {{--<span>Смена пароля</span>--}}
            {{--</a>--}}
            {{--<small>Здесь вы можете сменить свои данные для доступа в личный кабинет.</small>--}}

            <div class="col-md-12 profile">
                @yield('content.1')
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
