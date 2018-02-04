@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a>
                        <li>История заказов</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
                  _________________________________________________________ -->

                @include('user.menuProfile')

                <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>История заказов</h1>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Заказ</th>
                                    <th>Дата</th>
                                    <th>Итого</th>
                                    <th>Статус</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th># {{$order->id}}</th>
                                    <td>{{$order->created_at}}</td>
                                    <td>$ {{$order->total}}</td>
                                    <td>
                                        {!! ($order->status)? "<span class='label label-warning'>Обрабатываеться</span>" : "<span class='label label-success'>Обработан</span>" !!}
                                    </td>
                                    <td>
                                        <a href="{{route('viewOldOrdersById', [$order->id])}}"
                                           class="btn btn-primary btn-sm">Детальнее</a>
                                    </td>
                                </tr>
                            @endforeach

                            {{--<td style="display: -webkit-box;">--}}
                            {{--@foreach($order->orderGoods as $orderGoods)--}}
                            {{--<?php $good = \App\Goods::find($orderGoods->goods_id) ?>--}}
                            {{--<div style="max-width: 100px;">--}}
                            {{--<img src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>--}}
                            {{--</div>--}}
                            {{--@endforeach--}}
                            {{--</td>--}}

                            {{--<td>--}}
                            {{--<a href="{{route('viewOldOrdersById', [$order->id])}}"--}}
                            {{--class="ajax-btn-order  list-group-item list-group-item-info">Детальнее</a>--}}
                            {{--</td>--}}


                            {{--<script>--}}
                            {{--$(document).ready(function () {--}}
                            {{--$(".ajax-btn-order").click(function () {--}}

                            {{--var id = $(this).data('order-id');--}}


                            {{--})--}}


                            {{--});--}}


                            {{--</script>--}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection
