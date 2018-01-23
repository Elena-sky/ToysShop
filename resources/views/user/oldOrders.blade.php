@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h2>История заказов</h2>
                <table class="table table-hover">
                    <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                    <span>
                                        {{$order->id}}
                                    </span>
                                    </td>
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
                                        @foreach($order->goods as $good)
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
                                           class="ajax-btn-order list-group-item list-group-item-secondary">Детальнее</a>
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
