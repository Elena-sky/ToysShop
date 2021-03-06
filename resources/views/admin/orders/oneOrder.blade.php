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
            <li class="breadcrumb-item active">Детали заказа № {{$order->id}}
            </li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div>
                        <div>
                            <div>
                                <h3>Заказ № {{$order->id}}</h3>
                            </div>

                            <table class="table">
                                <thead>
                                <tr class="table-info">
                                    <th>Id заказа</th>
                                    <th>Пользователь ID</th>
                                    <th>Сумма</th>
                                    <th>Создан</th>
                                    <th>Статус</th>
                                    <th>Состояние</th>
                                    <th>Оплата</th>

                                    <th>
                                        @can('Orders-Delete')
                                            <a href="{{route('orderDelete', [$order->id])}}">
                                                <button type="button" class="btn btn-danger"><span
                                                            class="glyphicon glyphicon-pencil"></span> Удалить заказ
                                                </button>
                                            </a>
                                        @endcan
                                    </th>
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
                                    <td>{{$order->total}} грн</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{($order->status)? 'Обрабатываеться' : 'Обработан'}}</td>
                                    <td><b>{{($order->is_new)? 'Новый' : 'Старый'}}</b></td>
                                    <td>{{($order->is_paid)? 'Оплачен' : 'Неоплачен'}}</td>

                                    <td>
                                        @can('Orders-Edit')
                                            <a href="{{route('viewOrderUpdate', [$order->id])}}">
                                                <button type="button" class="btn btn-warning"><span
                                                            class="glyphicon glyphicon-pencil"></span> Изменить
                                                </button>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="adm-table">
                            <table class="table table-striped">
                                <tr class="max-sunbol">
                                    <td>Комментарий к заказу:</td>
                                    <td>{{$order->user_coment}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="adm-table">
                        <h3>Информация о доставке</h3>
                        <table class="table">
                            <thead>
                            <tr class="table-info">
                                <th>ФИО</th>
                                <th>Телефон</th>
                                <th>Город</th>
                                <th>Метод оплаты</th>
                                <th>Метод доставки</th>
                                <th>Адресс доставки</th>
                                <th></th>
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
                                <td>
                                    @can('Orders-Edit')
                                        <a href="{{route('viewDeliveryUpdate', [$order->id])}}">
                                            <button type="button" class="btn btn-warning"><span
                                                        class="glyphicon glyphicon-pencil"></span> Изменить
                                            </button>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="adm-table">
                        <h3>Товары</h3>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-info">
                                <th>id</th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Артикл</th>
                                <th>Картинка</th>
                                <th>Цена</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($order->orderGoods as $orderGoods)
                                <?php $good = \App\Goods::find($orderGoods->goods_id) ?>

                                <tr class="max-sunbol">

                                    <td>{{$orderGoods->goods_id}}</td>

                                    <td>{{$good->name}}</td>

                                    <td>
                                        @can('Orders-Edit')
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger btn-number"
                                                            data-action="minus" data-ogid="{{$orderGoods->id}}"
                                                            data-token="{{ csrf_token() }}">
                                                        <span class="glyphicon glyphicon-minus">-</span>
                                                    </button>
                                                </span>
                                                <input type="text" name="{{$good->id}}"
                                                       class="form-control input-number "
                                                       data-token="{{ csrf_token() }}"
                                                       value="{{$orderGoods->count}}">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-number"
                                                            data-action="plus" data-token="{{ csrf_token() }}"
                                                            data-ogid="{{$orderGoods->id}}">
                                                        <span class="glyphicon glyphicon-plus">+</span>
                                                    </button>
                                                </span>
                                            </div>
                                        @elsecannot('Orders-Edit')
                                            <input type="text" name="{{$good->id}}"
                                                   class="form-control input-number " data-token="{{ csrf_token() }}"
                                                   value="{{$orderGoods->count}}">
                                        @endcan
                                    </td>

                                    <td>{{$good->code}}</td>

                                    <td>
                                        <div>
                                            <img class="max-w100"
                                                 src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>
                                        </div>
                                    </td>

                                    <td>{{$good->price}} грн</td>

                                    <td>
                                        @can('Orders-Delete')
                                            <button type="button" class="btn btn-danger btn-delete" data-type="delete"
                                                    data-token="{{ csrf_token() }}"
                                                    data-ogid="{{$orderGoods->id}}"><span
                                                        class="glyphicon glyphicon-remove"></span> Удалить
                                            </button>
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
    </div>

    <!-- /.container-fluid-->

@endsection
