@extends('admin.template')

@section('content')
    <!-- Page Content -->

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('adminPageView')}}">Админпанель</a>
                </li>
                <li class="breadcrumb-item active">Управление пользователями</li>
            </ol>
            <!-- Area Chart Example-->

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>E-Mail</th>
                                <th>Телефон</th>
                                <th>Создан</th>
                                <th>Отредактированый</th>
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
                                    <td></td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
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
        </div>
        <!-- /.container-fluid-->

@endsection
