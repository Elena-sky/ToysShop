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
                @include('user.menuProfile')

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>Изменить пароль</h1>
                        <p class="text-muted">Измените здесь пароль.</p>

                        <form method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">E-Mail</label>

                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ $email or old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password-confirm">Повторите пароль</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Пароль</label>

                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Сохранить новый
                                    пароль
                                </button>
                            </div>
                        </form>

                        <hr>


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




    {{--<div id="all">--}}

    {{--<div id="content">--}}
    {{--<div class="container">--}}

    {{--<div class="col-md-12">--}}

    {{--<ul class="breadcrumb">--}}
    {{--<li><a href="{{route('index')}}">Главная</a>--}}
    {{--</li>--}}
    {{--<li>Восстановление пароля</li>--}}
    {{--</ul>--}}

    {{--</div>--}}

    {{--<div class="col-md-6">--}}
    {{--<div class="box">--}}
    {{--<h1>Восстановить пароль</h1>--}}

    {{--<hr>--}}

    {{--@if (session('status'))--}}
    {{--<div class="alert alert-success">--}}
    {{--{{ session('status') }}--}}
    {{--</div>--}}
    {{--@endif--}}

    {{--<form method="post" action="{{ route('password.email') }}">--}}
    {{--{{ csrf_field() }}--}}

    {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
    {{--<label for="email">Email</label>--}}
    {{--<input type="email" class="form-control" name="email"--}}
    {{--value="{{ old('email') }}" required>--}}

    {{--@if ($errors->has('email'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('email') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}

    {{--<div class="text-center">--}}
    {{--<button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>--}}
    {{--Отправить востановление пароля--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<!-- /.container -->--}}
    {{--</div>--}}
    {{--<!-- /#content -->--}}



@endsection