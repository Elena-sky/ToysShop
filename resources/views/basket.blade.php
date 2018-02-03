@extends('template')

@section('content')


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a></li>
                        <li>Корзина</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="checkout1.html">

                            <h1>Корзина</h1>
                            <p class="text-muted">У Вас {{Cart::count()}} товар(ов) в корзине.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Название</th>
                                        <th>Колличество</th>
                                        <th>Цена</th>
                                        <th colspan="2">Сумма</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($items))

                                        @foreach($items as $row)
                                            <tr data-item-id="{{$row->id}}">
                                                <td>
                                                    <a href="#">
                                                        <img src="{{url( asset("/uploads/goods/".\App\Http\Controllers\CartController::getGoodMainImage($row->id))) }}"
                                                             alt="{{$row->name}}">
                                                    </a>
                                                </td>
                                                <td><a href="#">{{$row->name}}</a>
                                                </td>
                                                <td>

                                                    <input type="number" value="{{$row->qty}}"
                                                           class="form-control itemCount">
                                                </td>
                                                <td>{{$row->price}}</td>
                                                <td data-item-price="{{$row->price}}">{{$row->price * $row->qty}}грн
                                                </td>
                                                <td><a href="#"><i class="fa fa-trash-o" data-row-id="{{$row->id}}"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <span><h1>Корзина пустая</h1></span>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('index')}}" class="btn btn-default"><i
                                                class="fa fa-chevron-left"></i> Продолжить покупки</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('viewCheckout')}}">
                                        <button type="submit" class="btn btn-primary">Перейти к оформлению заказа <i
                                                    class="fa fa-chevron-right"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->


                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>


                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="img/product3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.html">
                                                <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3>Fur coat</h3>
                                    <p class="price">$143</p>

                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                    </div>


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Итог заказа</h3>
                        </div>
                        <p class="text-muted"> После совершения заказа и заполнения полей доставки, наш консльтант
                            свяжеться с Вами для дальнейшей отправки заказа.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr class="total">
                                    <td>Итого</td>
                                    <th>{{Cart::subtotal ()}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection