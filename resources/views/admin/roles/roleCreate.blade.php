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
            <li class="breadcrumb-item active">Создать новую роль</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {{ Form::open(array('route' => array('roleCreateSave'))) }}

                <div class="form-group">
                    {{ Form::label('name', 'Имя роли') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Назначить разрешения</b></h5>

                <div class='form-group'>
                    @foreach ($permissions as $permission)
                        {{ Form::checkbox('permissions[]',  $permission->id ) }}
                        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                    @endforeach
                </div>

                {{ Form::submit('Создать', array('class' => 'btn btn-success')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection