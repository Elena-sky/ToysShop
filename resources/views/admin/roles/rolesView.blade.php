@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active">Управление ролями</li>
        </ol>
        <!-- Area Chart Example-->

        <div class="container">
            <div class="row">


                <div class="container">
                    <a href="{{route('roleCreate')}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Создать новую роль
                        </button>
                    </a>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr class="table-info">
                        <th>Роль</th>
                        <th>Разрешения</th>
                        <th>Операции</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>

                            <td>{{ $role->name }}</td>

                            {{--<td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>--}}
                            {{-- Retrieve array of permissions associated to a role and convert to string --}}
                            <td>
                                <a href="{{route('roleUpdate', $role->id)}}" class="btn btn-warning pull-left"
                                   style="margin-right: 3px;">Редактировать</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['roleDelete', $role->id] ]) !!}
                                {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
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