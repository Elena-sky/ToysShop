@extends('admin.template')

@section('content')
    <!-- Page Content -->

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('adminPageView')}}">Админпанель</a>
                </li>
                <li class="breadcrumb-item active"><i class="fa fa-users"></i> Управление пользователями</li>
            </ol>
            <!-- Area Chart Example-->

            <div class="container">
                <div class="row">
                    <div class="container">
                        <a href="{{route('userCreate')}}">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Создать нового пользователя
                            </button>
                        </a>
                    </div>
                    <h1><a href="{{ route('rolesView') }}" class="btn btn-default pull-right"><i
                                    class="fa fa-id-card"></i> Roles</a>
                        <a href="{{ route('permissionsView') }}" class="btn btn-default pull-right"><i
                                    class="fa fa-key"></i> Разрешения</a></h1>
                    <hr>
                    <table class="table table-striped">
                            <thead>
                            <tr class="table-info">
                                <th>ID</th>
                                <th>Имя</th>
                                <th>E-Mail</th>
                                <th>Дата/время создания</th>
                                <th>Отредактированый</th>
                                <th>Роль</th>
                                <th>Операции</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user )
                                <tr class="max-sunbol">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    {{--<td>{{ $user->created_at->format('F d, Y h:ia') }}</td>--}}
                                    <td>{{$user->updated_at}}</td>
                                    {{-- Retrieve array of roles associated to a user and convert to string --}}
                                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                                    <td>
                                        <a href="{{route('viewUserPage', [$user->id])}}">
                                            <button type="button" class="btn btn-info">Обзор</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('viewUserUpdate', [$user->id])}}">
                                            <button type="button" class="btn btn-warning">Изменить</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('actionDeleteProduct', [$user->id])}}">
                                            <button type="button" class="btn btn-danger">Удалить</button>
                                        </a>
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
