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
            <li class="breadcrumb-item active">Редактировать профиль пользователя</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {!! Form::model($user, array('route' => array('actionSaveUser')) ) !!}
                <input name="id" type="hidden" value="{{$user->id}}">


                <div class="form-group">
                    {!! Form::label('productName', 'Имя:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productCode', 'E-Mail:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('code', $user->email, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-sm-offset-2 col-sm-10 btn btn-success">
                        {!! Form::submit('Сохранить изминения') !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
