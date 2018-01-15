@extends('template')

@section('content')
    <!-- Page Content -->

    <div class="container">

        <div class="row">

            <div class="col-md-12" style="display: inline-flex; padding: 15px">


                <div class="col-md-6">

                    <h3>Оформление заказа</h3>

                    {!! Form::model($user, array('route' => array('viewSaveCheckout'))
                        ) !!}
                    <div class="col-sm-10">
                        {!! Form::hidden('user_id', $user->id, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('userLastName', 'Фамилия Имя Отчество') !!}
                        <div class="col-sm-10">
                            {!! Form::text('full_name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Мобильный телефон') !!}
                        <div class="col-sm-10">
                            {!! Form::text('phone', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('city', 'Город') !!}
                        <div class="col-sm-10">
                            {!! Form::text('city', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('payment', 'Метод оплаты') !!}
                        <div class="col-sm-10">
                            {!! Form::select('payment_method', ["Картой", "Наличными"], ['class' => 'form-control'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('delivery', 'Метод доставки') !!}
                        <div class="col-sm-10">
                            {!! Form::select('delivery_method', ["Самовывоз", "Новая почта", "Укрпочта", "Интайм"], ['class' => 'form-control'])!!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('address', 'Адрес доставки/номер отделения') !!}
                        <div class="col-sm-10">
                            {!! Form::text('delivery_address', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('comment', 'Коментарий к заказу') !!}
                        <div class="col-sm-10">
                            {!! Form::text('comment', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-10">
                        {!! Form::hidden('status', 1, ["1", "0"], ['class' => 'form-control'])!!}
                    </div>

                    <div class="col-sm-10">
                        Подтвеждая заказ, я принимаю условия
                        <a href="" data-toggle="modal"
                           data-target=".bs-example-modal-lg">Пользовательского соглашения</a>

                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content col-sm-12">
                                    <h1>Пользовательское соглашение</h1>
                                    Компания МОРЕ ИГРУШЕК осуществляет продажу товаров через интернет-магазин по ссылке
                                    https://# Используя наш сайт, вы автоматически соглашаетесь с его условиями, а также
                                    даете согласие на сбор и обработку персональной информации. Пожалуйста, внимательно
                                    ознакомьтесь с установленными положениями перед началом просмотра страниц сайта.
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::button('Оформить заказ', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                        </div>


                    </div>

                    {!! Form::close() !!}

                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <h3>Вы выбрали:</h3>
                        @foreach($items as $row )
                            <div style="display: inline-flex">
                                <div style="padding: 5px">

                                    <img alt="{{$row->name}}" style=" width: 72px; height: 72px;"
                                         src="{{url( asset("/uploads/goods/".\App\Http\Controllers\CartController::getGoodMainImage($row->id))) }}"/>

                                </div>
                                <div>
                                    <div style="font-size: .846em; line-height: 1.273em; margin-bottom: .75em; padding-top: .636em;">
                                        <div>
                                            {{$row->name}}
                                        </div>
                                        <div>
                                            Количество: {{$row->qty}} шт.
                                        </div>
                                        <div>
                                            Цена: {{$row->price}} грн за 1 шт.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div style="border-top: 1px solid #cdd3d5; margin-top: 1em; padding-top: .846em;">
                            К оплате: {{Cart::subtotal ()}} грн (без учета доставки)
                        </div>

                        <a href="{{route('cartView')}}">Редактировать заказ</a>

                    </div>
                </div>


            </div>

        </div>
    </div>



    <!-- /.container -->


@endsection
