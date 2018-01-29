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
                <a href="{{route('viewOneOrder', [$order->id])}}">Детали заказа</a>
            </li>
            <li class="breadcrumb-item active"> Редактировать заказ</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {!! Form::model($order, array('route' => array('actionOrderSave'))
                ) !!}
                <input name="id" type="hidden" value="{{$order->id}}">

                <div class="form-group ">
                    {!! Form::label('is_ew', 'Состояние заказа:') !!}
                    <div class="col-sm-12">
                        {!! Form::radio('is_new', 1) !!} Новый
                        {!! Form::radio('is_new', 0) !!} Старый
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('orderStatus', 'Статус:') !!}
                    <div class="col-sm-12">
                        {!! Form::radio('status', 1) !!} Обрабатываеться
                        {!! Form::radio('status', 0) !!} Обработан
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('total', 'Сумма:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('total', $order->total, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('userComment', 'Коментарий к заказу	:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('user_coment', $order->comment, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('isPaid', 'Оплата:') !!}
                    <div class="col-sm-12">
                        {!! Form::radio('is_paid', 1) !!} Оплачен
                        {!! Form::radio('is_paid', 0) !!} Неоплачен
                    </div>
                </div>


                <div class="form-group ">
                    <div class=" col-sm-10">
                        <h3>{{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                        </h3>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection