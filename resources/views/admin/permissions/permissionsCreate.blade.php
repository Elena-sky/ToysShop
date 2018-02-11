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
            <li class="breadcrumb-item active">Добавить новое разрешение</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {{ Form::open(array('route' => array('permissionsSaveCreate'))) }}

                <div class="form-group">
                    {{ Form::label('name', 'Имя разрешения') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <br>
                {{--If no roles exist yet--}}
                @if(!$roles->isEmpty())
                <h4>Assign Permission to Roles</h4>

                @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                @endforeach
                @endif
                <br>
                {{ Form::submit('Создать', array('class' => 'btn btn-success')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection