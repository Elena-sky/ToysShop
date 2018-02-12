@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active">Заказы</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="div-btn-orders-view">
                        <div class="btn-orders-view">
                            <a href="?isnew=1">
                                <button type="button" class="btn btn-outline-success btn-sm"><span
                                            class="glyphicon glyphicon-pencil"></span>Новые заказы
                                </button>
                            </a>
                        </div>
                        <div class="btn-orders-view">
                            <a href="?isnew=0">
                                <button type="button" class="btn btn-outline-warning btn-sm"><span
                                            class="glyphicon glyphicon-pencil"></span>Обработанные заказы
                                </button>
                            </a>
                        </div>
                        <div class="btn-orders-view">
                            <a href="{{route('viewAllOrders')}}">
                                <button type="button" class="btn btn-outline-info btn-sm"><span
                                            class="glyphicon glyphicon-pencil"></span>Все заказы
                                </button>
                            </a>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                        <tr class="table-info">
                            <th>Id заказа</th>
                            <th>Пользователь</th>
                            <th>Сумма</th>
                            <th>Создан</th>
                            <th>Статус</th>
                            <th>Состояние</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="max-sunbol">
                                <td>{{$order->id}}</td>
                                <td>
                                    <a href="{{route('viewUserPage', [$order->user_id])}}">
                                        ID: {{$order->user_id}}
                                    </a>
                                </td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{($order->status)? 'Обрабатываеться' : 'Обработан'}}</td>
                                <td><b>{{($order->is_new)? 'Новый':'Старый'}}</b></td>
                                <td>
                                    <a href="{{route('viewOneOrder', [$order->id])}}">
                                        <button type="button" class="btn btn-info"><span
                                                    class="glyphicon glyphicon-eye-open"></span> Обзор
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    @can('Orders-Delete')
                                        <a href="{{route('orderDelete', [$order->id])}}">
                                            <button type="button" class="btn btn-danger"><span
                                                        class="glyphicon glyphicon-pencil"></span> Удалить заказ
                                            </button>
                                        </a>
                                    @endcan
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
