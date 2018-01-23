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
                            Итого: {{$order->total}} грн
                        </div>
                    </div>


                    <table class="table">
                        <tbody>
                        @foreach()
                            <tr>
                                <td>Mark</td>
                                <td>Otto

                                </td>
                                <td>@mdo</td>
                                <th scope="row">1</th>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

@endsection
