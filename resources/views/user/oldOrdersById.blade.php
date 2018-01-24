@extends('template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="display: -webkit-box;">
                        <div class="col-md-6">
                            <h3>Заказ № {{$order->id}}</h3>
                            Статус: {{($order->status)? 'Обрабатываеться' : 'Обработан'}}
                        </div>
                        <div class="col-md-6">
                            <h3>Итого: {{$order->total}} грн</h3>
                        </div>
                    </div>
                    @foreach($order->goods as $good)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="display: -webkit-box;">
                                    <div style="max-width: 100px;">
                                        <img src="{{url( asset("/uploads/goods/".$good->getFirstImage())) }}"/>
                                    </div>
                                </td>
                                <td>
                                    <span>{{$good->name}}</span>
                                </td>
                                <td>Количество</td>
                                <th scope="row">{{$good->price}}</th>

                            </tr>
                        </tbody>
                    </table>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
