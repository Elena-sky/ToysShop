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
            <li class="breadcrumb-item active">Создание нового пользователя</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row adm-row">
                {!! Form::model('', array('route' => array('userStore'), 'files' => true)
                ) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Имя') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', '', array('class' => 'form-control')) }}
                </div>

                <div class='form-group'>
                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id ) }}
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

                {{ Form::submit('Создать', array('class' => 'btn btn-primary')) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->
@endsection