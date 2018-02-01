@extends('template')

@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a>
                        </li>
                        <li>Мой профиль</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Мой профиль</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile') }}"><i class="fa fa-key"></i> Изменить пароль</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                          method="POST"> {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>Персональная информация</h1>
                        <p class="text-muted">Измените здесь свои личные данные.</p>

                        <h3>Персональная информация</h3>
                        {!! Form::model($user, array('route' => array('actionSaveProfile')) ) !!}

                        <input name="id" type="hidden" value="{{$user->id}}">

                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('UserName', 'Имя:') !!}
                                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('UserEmail', 'Email:') !!}
                                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {!! Form::label('UserPhone', 'Телефон') !!}
                                        {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    {{ Form::button('<i class="fa fa-save"></i> Сохранить изменения', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection
