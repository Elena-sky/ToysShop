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

                    <div class="form-group">
                        {!! Form::label('userFirstName', 'Имя') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userLastName', 'Фамилия') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userG', 'Город') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Мобильный телефон') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Метод доставки') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Адрес') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Номер дома') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Квартира') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('userPhone', 'Коментарий к заказу') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10 btn btn-success">
                            {!! Form::submit('Оформить заказ') !!}
                        </div>
                        Подтвеждая заказ, я принимаю условия
                    </div>

                    {!! Form::close() !!}

                </div>
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <h3>Вы выбрали:</h3>
                        @foreach($items as $row )
                            <div style="display: inline-flex">
                                <div style="padding: 5px">
                                    <img src="{{ asset("/uploads/".\App\Http\Controllers\CartController::getGoodMainImage($row->id)) }}"
                                         width="80" height="76" alt="{{$row->name}}">
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
                            К оплате: {{Cart::total()}} грн (без учета доставки)
                        </div>

                        <a href="{{route('cartView')}}">Редактировать заказ</a>

                    </div>
                </div>


            </div>

        </div>
    </div>



    <!-- /.container -->


@endsection
