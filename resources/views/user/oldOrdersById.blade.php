@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">

                    <table class="table">
                        <thead>
                        <tr>
                            <th><h3>Заказ № {{$order->id}}</h3></th>
                        </tr>
                        </thead>

                        @foreach($order->orderGoods as $orderGoods)
                            <?php $good = \App\Goods::find($orderGoods->goods_id) ?>
                        <tbody>
                            <tr>
                                <th style="display: -webkit-box;">
                                    <div style="max-width: 100px;">
                                        <img src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>
                                    </div>
                                </th>
                                <td>{{$good->name}}</td>
                                <td>
                                    {{$orderGoods->count}} шт
                                </td>
                                <td>{{$good->price}} грн</td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>

                    <div style="float:  right;">
                        <div><h5>Статус оплаты: <b>{{($order->is_paid)? 'Оплачен' : 'Неоплачен'}}</b></h5></div>
                        <div>
                            <h5>Статус заказа: {{($order->status)? 'Обрабатываеться' : 'Обработан'}}</h5>
                        </div>
                        <div>
                            <h4>Итого: {{$order->total}} грн</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
