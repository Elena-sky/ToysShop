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
            <li class="breadcrumb-item active">Детали заказа №
                <td>{{$order->id}}</td>
            </li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div>
                        <div style="margin-bottom: 50px">
                            <h3>Заказ №
                                <td>{{$order->id}}</h3>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id заказа</th>
                                    <th>Пользователь ID</th>
                                    <th>Сумма</th>
                                    <th>Создан</th>
                                    <th>Отредактирован</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="max-sunbol">
                                    <td>{{$order->id}}</td>
                                    <td>
                                        <a href="{{route('viewUserPage', [$order->user_id])}}">
                                            {{$userName->name}}
                                        </a>
                                    </td>
                                    <td>{{$order->total}}</td>
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
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-bottom: 50px">
                            <table class="table table-striped">
                                <tr class="max-sunbol">
                                    <td>Комментарий к заказу:</td>
                                    <td>{{$order->user_coment}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>


                    <div style="margin-bottom: 50px">
                        <h3>Информация о доставке</h3>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Телефон</th>
                                <th>Город</th>
                                <th>Метод оплаты</th>
                                <th>Метод доставки</th>
                                <th>Адресс доставки</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="max-sunbol">
                                <td>{{$delivery->full_name}}</td>
                                <td>{{$delivery->phone}}</td>
                                <td>{{$delivery->city}}</td>
                                <td>{{$delivery->payment_method}}</td>
                                <td>{{$delivery->delivery_method}}</td>
                                <td>{{$delivery->delivery_address}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-bottom: 50px">
                        <h3>Товары</h3>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Артикл</th>
                                <th>Картинка</th>
                                <th>Цена</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->goods as $good)
                                <tr class="max-sunbol">
                                    <td>{{$good->id}}</td>
                                    <td>{{$good->name}}</td>
                                    <td>{{$good->getGoodCount($order->id)}}</td>
                                    <td>{{$good->code}}</td>
                                    <td>
                                        <div>
                                            <img style="max-width: 100px;"
                                                 src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>
                                        </div>
                                    </td>
                                    <td>{{$good->price}}</td>
                                    <td>Редактировать</td>
                                    <td>Удалить</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection
