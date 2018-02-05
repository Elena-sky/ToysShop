@extends('template')

@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a>
                        <li><a href="{{route('viewOldOrders')}}">История заказов</a></li>
                        <li>Заказ № {{$order->id}}</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
               _________________________________________________________ -->

                @include('user.menuProfile')

                <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Заказ № {{$order->id}}</h1>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Продукт</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Сумма</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderGoods as $orderGoods)
                                    <?php $good = \App\Goods::find($orderGoods->goods_id) ?>
                                    <tr>
                                        <td colspan="2">
                                            <a href="#">
                                                <img src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>
                                            </a>
                                        </td>
                                        <td><a href="#">{{$good->name}}</a>
                                        </td>
                                        <td>{{$good->price}} грн</td>
                                        <td>{{$orderGoods->count}} шт</td>
                                        <td>{{$good->price * $orderGoods->count}} грн</td>
                                    </tr>
                                @endforeach

                                </tbody>

                                <tfoot>
                                <tr>
                                    <th colspan="5" class="text-right"><b>Статус оплаты</b></th>
                                    <th>{{($order->is_paid)? 'Оплачен' : 'Неоплачен'}}</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right"><b>Статус заказа</b></th>
                                    <th>{{($order->status)? 'Обрабатываеться' : 'Обработан'}}</th>
                                </tr>
                                <tr>
                                    <th colspan="5" class="text-right"><b>Итого</b></th>
                                    <th>{{$order->total}} грн</th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-6">
                                <h2>Инфо о получателе</h2>
                                <p>{{$delivery->full_name}}
                                    <br>{{$delivery->phone}}
                                    <br>{{$delivery->city}}</p>
                            </div>
                            <div class="col-md-6">
                                <h2>Инфо о доставке и оплате</h2>
                                <p>{{$delivery->payment_method}}
                                    <br>{{$delivery->delivery_method}}
                                    <br>{{$delivery->delivery_address}}</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection
