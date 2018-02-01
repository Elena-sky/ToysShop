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
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>{{$user->id}}</th>
                        </tr>
                        <tr class="max-sunbol">
                            <td>Имя</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr class="max-sunbol">
                            <td>E-Mail</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr class="max-sunbol">
                            <td>Телефон</td>
                            <td>{{$user->рhone}}</td>
                        </tr>
                        <tr class="max-sunbol">
                            <td>Создан</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        <tr class="max-sunbol">
                            <td>Отредактированый</td>
                            <td>{{$user->updated_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
