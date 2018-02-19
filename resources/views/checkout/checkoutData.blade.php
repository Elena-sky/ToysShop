@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a></li>
                        <li>Оформление заказа</li>
                    </ul>
                </div>

                <div class="col-md-6" id="checkout">

                    <div class="box">
                        <h1>Оформление заказа</h1>

                        {!! Form::model($user, array('route' => array('viewSaveCheckout')) ) !!}

                        <div>
                            <ul class="nav nav-tabs nav-pills nav-justified">
                                <li class="active">
                                    <a data-toggle="tab" href="#adress">
                                        <i class="fa fa-map-marker"></i><br>Шаг 1 <br> Адресс
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#delivery">
                                        <i class="fa fa-truck"></i><br>Шаг 2 <br> Метод доставки
                                    </a>
                                </li>
                                <li><a data-toggle="tab" href="#comments">
                                        <i class="fa fa-money"></i><br>Шаг 3 <br> Метод оплаты
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="adress" class="tab-pane fade in active product-description">
                                    <h3> Заполните поля</h3>

                                    <div class="content">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('userLastName', 'Фамилия Имя Отчество') !!}
                                                    {!! Form::text('full_name', '', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('userPhone', 'Мобильный телефон') !!}
                                                    {!! Form::text('phone', '', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('city', 'Город') !!}
                                                    {!! Form::text('city', '', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('comment', 'Коментарий к заказу') !!}
                                                    {!! Form::text('comment', '', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                    </div>
                                </div>

                                <div id="delivery" class="tab-pane fade">
                                    <h3> Заполните адресс и выберете метод доставки</h3>
                                    <div class="content">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Адрес доставки/номер отделения') !!}
                                                    {!! Form::text('delivery_address', '', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="box shipping-method">
                                                    <h4>Самовывоз</h4>
                                                    <p>Самовывоз от нашего склада.</p>
                                                    <div class="box-footer text-center">
                                                        <input type="radio" name="delivery_method" value="Самовывоз">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="box shipping-method">
                                                    <h4>Новая почта</h4>
                                                    <p>Доставка на отделение Новой почты.</p>
                                                    <div class="box-footer text-center">
                                                        <input type="radio" name="delivery_method" value="Новая почта">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="box shipping-method">
                                                    <h4>Укрпочта</h4>
                                                    <p>Доставка на отделение Укрпочты.</p>
                                                    <div class="box-footer text-center">
                                                        <input type="radio" name="delivery_method" value="Укрпочта">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="box shipping-method">
                                                    <h4>Интайм</h4>
                                                    <p>Доставка на отделение Интайм.</p>
                                                    <div class="box-footer text-center">
                                                        <input type="radio" name="delivery_method" value="Интайм">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                    </div>
                                    <!-- /.content -->
                                </div>
                                <div id="comments" class="tab-pane fade">
                                    <h3>Выберете метод оплаты</h3>

                                    <div class="content">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="box payment-method">
                                                    <h4>Картой</h4>
                                                    <p>Оплата заказа с банковской карты.</p>
                                                    <div class="box-footer text-center">
                                                        <input type="radio" name="payment_method" value="Картой">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="box payment-method">
                                                    <h4>Наличными</h4>
                                                    <p>Оплата наличными при получении.</p>
                                                    <div class="box-footer text-center">
                                                        <input type="radio" name="payment_method" value="Наличными">
                                                    </div>
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
                                                            Компания МОРЕ ИГРУШЕК осуществляет продажу товаров через
                                                            интернет-магазин по ссылке
                                                            https://# Используя наш сайт, вы автоматически соглашаетесь
                                                            с его условиями, а также
                                                            даете согласие на сбор и обработку персональной информации.
                                                            Пожалуйста, внимательно
                                                            ознакомьтесь с установленными положениями перед началом
                                                            просмотра страниц сайта.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.content -->
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{route('cartView')}}" class="btn btn-default"><i
                                            class="fa fa-chevron-left"></i>Вернуться к корзине</a>
                            </div>
                            <div class="pull-right">
                                <div class="form-group ">
                                    {!! Form::button('Оформить заказ<i class="fa fa-chevron-right"></i>', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-6">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Вы выбрали:</h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Название</th>
                                    <th>Колличество</th>
                                    <th>Цена</th>
                                    <th>Сумма</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $row )

                                    <tr>
                                        <td>
                                            <img class="img-checkout" alt="{{$row->name}}"
                                                 src="{{url( asset("/uploads/goods/".\App\Http\Controllers\CartController::getGoodMainImage($row->id))) }}"/>
                                        </td>
                                        <th>{{$row->name}}</th>
                                        <th>{{$row->qty}} шт.</th>
                                        <th>{{$row->price}} грн</th>
                                        <th>{{$row->price * $row->qty}} грн</th>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <h4> К оплате: {{Cart::subtotal ()}} грн</h4> (без учета доставки)
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>

@endsection