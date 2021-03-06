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
            <li class="breadcrumb-item">
                <a href="{{route('viewOneOrder', [$orderId])}}">Детали заказа</a>
            </li>
            <li class="breadcrumb-item active"> Редактировать данные о доставке</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row adm-row">
                {!! Form::model($delivery, array('route' => array('actionDeliverySave', $delivery->id))
                ) !!}
                <input name="orderId" type="hidden" value="{{$orderId}}">

                <input type="hidden" name="_method" value="PUT">


                <div class="form-group">
                    {!! Form::label('userName', 'Имя:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('full_name', $delivery->full_name, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('userPhone', 'Телефон:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('phone', $delivery->phone, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('userCity', 'Город:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('city', $delivery->city, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('paymentMethod', 'Метод оплаты:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('payment_method', $delivery->payment_method, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('deliveryMethod', 'Метод доставки:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('delivery_method', $delivery->delivery_method, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('deliveryAddress', 'Адресс доставки:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('delivery_address', $delivery->delivery_address, ['class' => 'form-control']) !!}
                    </div>
                </div>

                {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection