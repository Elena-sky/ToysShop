@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active"><i class="fa fa-key"></i> Управление разрешениями</li>
        </ol>
        <!-- Area Chart Example-->

        <div class="container">
            <h1><i class="fa fa-key"></i>Доступные разрешения пользователей</h1>
            <div class="row form-group">
                <a href="{{route('permissionsCreate')}}">
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Создать новое разрешение
                    </button>
                </a>
            </div>

            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr class="table-info">
                        <th>Разрешения</th>
                        <th></th>
                        <th></th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>

                            <td>
                                <a href="{{route('permissionsUpdate', [$permission->id])}}">
                                    <button type="button" class="btn btn-warning">Изменить</button>
                                </a>
                            </td>

                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['permissionsDelete', $permission->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection