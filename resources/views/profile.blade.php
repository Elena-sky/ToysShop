@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать профиль</div>

                    <div class="panel-body">

                        {!! Form::model($user, array('route' => array('actionSaveProfile')) ) !!}
                        <input name="id" type="hidden" value="{{$user->id}}">

                        <div class="form-group">
                            {!! Form::label('UserName', 'Имя:') !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            E-Mail: {{$user->email}}
                        </div>

                        <div class="form-group ">
                            <div class=" col-sm-10">
                                <h3>{{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                                </h3>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="col-md-9">--}}
    {{--<div class="panel panel-primary">--}}
    {{--<div class="panel-heading">Личный кабинет</div>--}}
    {{--<div class="panel-body panel-profile">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="profile-item profile-item-user">--}}
    {{--<a href="#">--}}
    {{--<span>Личные данные</span>--}}
    {{--</a>--}}
    {{--<small>В этом разделе вы можете изменить свои личные данные.</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="profile-item profile-item-orders">--}}
    {{--<a href="#">--}}
    {{--<span>Заказы</span>--}}
    {{--</a>--}}
    {{--<small>Информация о всех ваших заказах: номера, даты, состав заказов и их статусы.</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="profile-item profile-item-star">--}}
    {{--<a href="#">--}}
    {{--<span>Избранное</span>--}}
    {{--</a>--}}
    {{--<small>Информация о всех ваших заказах: номера, даты, состав заказов и их статусы.</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="profile-item profile-item-eye">--}}
    {{--<a href="#">--}}
    {{--<span>Вы смотрели</span>--}}
    {{--</a>--}}
    {{--<small>Здесь можно увидеть список ранее просмотренных вами товаров.</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="profile-item profile-item-pwd">--}}
    {{--<a href="#">--}}
    {{--<span>Смена пароля</span>--}}
    {{--</a>--}}
    {{--<small>Здесь вы можете сменить свои данные для доступа в личный кабинет.</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
