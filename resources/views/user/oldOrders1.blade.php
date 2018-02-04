@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <table class="table table-hover">
                    <thead>
                    <tr class="table-success">
                        <th>Заказ №</th>
                        <th></th>
                        <th>
                            <h2>История заказов</h2>
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)

                        <tr>
                            <th>
                                {{$order->id}}
                            </th>

                            <td>
                                <div>
                                        <span>
                                           Итого: {{$order->total}} грн
                                        </span>
                                </div>
                                <div>
                                        <span>
                                        {{$order->created_at}}
                                    </span>
                                </div>
                            </td>
                            <td style="display: -webkit-box;">
                                @foreach($order->orderGoods as $orderGoods)
                                    <?php $good = \App\Goods::find($orderGoods->goods_id) ?>
                                    <div style="max-width: 100px;">
                                        <img src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                    <span>
                                      {{($order->status)? 'Обрабатываеться' : 'Обработан'}}
                                    </span>
                            </td>
                            <td>
                                <a href="{{route('viewOldOrdersById', [$order->id])}}"
                                   class="ajax-btn-order  list-group-item list-group-item-info">Детальнее</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$(".ajax-btn-order").click(function () {--}}

    {{--var id = $(this).data('order-id');--}}


    {{--})--}}


    {{--});--}}


    {{--</script>--}}
@endsection
