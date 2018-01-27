@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active">Все заказы</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr class="table-info">
                            <th>Id заказа</th>
                            <th>Пользователь</th>
                            <th>Сумма</th>
                            <th>Способ доставки</th>
                            <th>Создан</th>
                            <th>Отредактирован</th>
                            <th>Статус</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="max-sunbol">
                                <td>{{$order->id}}</td>
                                <td>{{$order->user_id}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->delivery_id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td>{{($order->status)? 'Обрабатываеться' : 'Обработан'}}</td>
                                <td>
                                    <a href="{{route('viewOneOrder', [$order->id])}}">
                                        <button type="button" class="btn btn-info"><span
                                                    class="glyphicon glyphicon-eye-open"></span> Обзор
                                        </button>
                                    </a>
                                </td>
                                <td>Удалить</td>
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
