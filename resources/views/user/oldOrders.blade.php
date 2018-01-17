@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="col-md-4">
                        <h3>История заказов</h3>
                        <div class="list-group">
                            @foreach($orders as $order)

                                <a href="{{route('viewOldOrdersById', [$order->id])}}"
                                   class="ajax-btn-order list-group-item list-group-item-secondary">{{$order->created_at}}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="panel-heading">

                        </div>

                        <div class="panel-body">
                            <h5>Информация о всех ваших заказах: номера, даты, состав заказов и их статусы.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(".ajax-btn-order").click(function () {

                var id = $(this).data('order-id');


            })


        });


    </script>
@endsection
