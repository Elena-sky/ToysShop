@extends('template')

@section('content')
    <!-- Page Content -->

    <div class="card">
        <div class="container-fliud">

            <div class="wrapper row">
                <div class="preview col-md-6">

                    <style>

                        .product-images {
                            width: 70%;
                        }

                        @media only screen and (max-width: 959px) {
                            .product-images {
                                width: 100%;
                            }
                        }

                        .product-images > li {
                            display: inline-block;
                            width: 64px;
                            height: product-dimenstions(64px);
                            overflow: hidden;
                            margin: 5px;
                        }

                        .product-images > li.preview {
                            width: 100%;
                            height: auto;
                            margin: 0;
                        }

                        .product-images img {
                            display: block;
                            width: 100%;
                        }
                    </style>

                    <ul class="product-images">
                        <?php $item_class = ' preview'; ?>
                        @foreach($images as $image )
                            <li class="<?= $item_class ?>">
                                <?php $item_class = ''; /* убираем 'preview' для следующих */ ?>

                                <a href="javascript:void(0)">
                                    <img src="{{ asset("/uploads/$image->filename") }}" width="300px"
                                         alt="{{$image->id}}"></a>
                            </li>
                        @endforeach
                    </ul>
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
                        <span class="review-no">Наличие: {{ ($good->is_avaliable)? 'В наличии' : 'Нет в наличии'}}</span>

                    </div>

                    <div>
                        <div class="price box"><h4>Цена: <span class="lead">{{$good->price}} грн</span>
                                грн</h4></div>
                        <div class="action box">
                            <div class="action">
                                <button class="btn-warning ajax-btn buttonBuy box" data-good-id="{{ $good->id}}">
                                    <span>Купить </span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Описание: </a></li>
                                <li><a data-toggle="tab" href="#menu1">Доставка: </a></li>
                                <li><a data-toggle="tab" href="#menu2">Отзывы:</a></li>
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
                                    </p>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>Отзывы:</h3>
                                    <p>Нет отзывов.</p>
                                    <button type="button" class="btn btn-outline-info">Добавить отзыв</button>

                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <h3>Menu 3</h3>
                                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                        dicta
                                        sunt explicabo.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- /.container -->


        {{--<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>--}}
        <script>var Chef = {
                init: function () {
                    this.productImagePreview();
                    this.menuToggle();
                    this.misc();
                },

                productImagePreview: function () {
                    $(document).on('click', '.product-images li', function () {
                        if (!$(this).hasClass('preview')) {
                            var src = $(this).find('img').attr('src');
                            $('.product-images .preview img').attr('src', src);
                        }
                    });
                }
            };

            $(function () {
                Chef.init();
            });
            //# sourceURL=pen.js
        </script>

@endsection
