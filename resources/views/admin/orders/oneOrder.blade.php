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
                <a href="{{route('viewAllOrders')}}">Все заказы</a>
            </li>
            <li class="breadcrumb-item active">Детали заказа</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3>Заказ</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id заказа</th>
                            {{--<th>Сортировка?</th>--}}
                            <th>Пользователь ID</th>
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
                        <tr class="max-sunbol">
                            <td>{{$order->id}}</td>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->delivery_id}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at}}</td>
                            <td>{{($order->status)? 'Обрабатываеться' : 'Обработан'}}</td>
                            {{--<td>--}}
                            {{--<a href="{{route('viewOneOrder', [$order->id])}}">--}}
                            {{--<button type="button" class="btn btn-info"><span--}}
                            {{--class="glyphicon glyphicon-eye-open"></span> Обзор--}}
                            {{--</button>--}}
                            {{--</a>--}}
                            {{--</td>--}}
                        </tr>
                    </table>

                    <h3>Информация о доставке</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="max-sunbol">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>

                    <h3>Товары</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="max-sunbol">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection
