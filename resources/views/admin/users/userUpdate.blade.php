@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('viewUsers')}}">Управление пользователями</a>
            </li>
            <li class="breadcrumb-item active">Редактировать пользователя {{$user->name}}</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row adm-row">
                {{ Form::model($user, array('route' => array('actionSaveUser', $user->id))) }}
                {{-- Form model binding to automatically populate our fields with user data --}}

                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    {{ Form::label('userName', 'Имя') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('userEmail', 'Email') }}
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Назначить роль</b></h5>

                <div class='form-group'>
                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                    @endforeach
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Пароль') }}<br>
                    {{ Form::password('password', array('class' => 'form-control')) }}

                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Подтвердите пароль') }}<br>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                </div>

                {{ Form::submit('Сохранить изменения', array('class' => 'btn btn-success')) }}

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
