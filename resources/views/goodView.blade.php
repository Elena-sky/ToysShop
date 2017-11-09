@extends('template')

@section('content')
    <!-- Page Content -->

    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <img class="goodImg" src="{{ asset("/images/$good->image") }}">


                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$good->name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>

                        <span class="review-no">Артикл: {{$good->code}}</span> <br/>
                        <span class="review-no">Наличие: {{$good->is_avaliable}}</span>

                    </div>

                    <div>
                        <div class="price box"><h4>Цена: <span>$180</span> грн</h4></div>
                        <div class="action box">
                            <a href="{{action('CartController@actionAdd',['id' => $good->id])}}">
                                <button class="buttonBuy" style=""><span>Купить </span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Описание: </a></li>
                            <li><a data-toggle="tab" href="#menu1">Доставка: </a></li>
                            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                            <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active product-description">
                                <h3>Описание: </h3>
                                <p>{{$good->description}}</p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Доставка:</h3>
                                <p>
                                <ul class="b">
                                    <li>Самовывоз из магазина (Одесса)</li>
                                    <li>На склад "Новой Почты" по тарифам оператора</li>
                                    <li>На склад "Укрпочты" по тарифам оператора</li>
                                </ul>
                                .</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <h3>Menu 3</h3>
                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                    sunt explicabo.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <!-- /.container -->


@endsection
