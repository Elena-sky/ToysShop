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
                <a href="{{route('rolesView')}}">Управление ролями</a>
            </li>
            <li class="breadcrumb-item active">Редактировать роли {{$role->name}}</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {{ Form::model($role, array('route' => array('roleSaveUpdate'), 'method' => 'POST')) }}

                <input name="id" type="hidden" value="{{$role->id}}">


                <div class="form-group">
                    {{ Form::label('name', 'Имя роли') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)

                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
                <br>
                {{ Form::submit('Сохранить', array('class' => 'btn btn-success')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection