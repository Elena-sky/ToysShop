@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Редактировать профиль</h2>
                    </div>

                    <div class="panel-body">
                        <h5>В этом разделе вы можете изменить свои личные данные</h5>
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

@endsection
