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
                <a href="{{route('permissionsView')}}">Управление разрешениями</a>
            </li>
            <li class="breadcrumb-item active">Редактировать разрешение - {{$permission->name}}</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row adm-row">
                {{ Form::model($permission, array('route' => array('permissionsSaveUpdate'), 'method' => 'POST')) }}
                {{-- Form model binding to automatically populate our fields with permission data --}}
                <input name="id" type="hidden" value="{{$permission->id}}">

                <div class="form-group">
                    {{ Form::label('name', 'Имя разрешения') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Сохранить', array('class' => 'btn btn-success')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection