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
                        @if(isset($images))
                        <?php $item_class = ' preview'; ?>
                        @foreach($images as $image )
                            <li class="<?= $item_class ?>">
                                <?php $item_class = ''; /* убираем 'preview' для следующих */ ?>

                                <a href="javascript:void(0)">
                                    <img src="{{ asset("/uploads/goods/$image->filename") }}" width="300px"
                                         alt="{{$image->id}}"></a>
                            </li>
                        @endforeach
                        @else
                            <li class=" preview">
                                <img src="{{ asset("/uploads/no_picture.jpg") }}" style="max-width:300px"
                                     alt="{{'no_picture'}}">
                            </li>
                        @endif
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
                                <li>
                                    <a data-toggle="tab" href="#description">
                                        <button class="btn btn-outline-primary">Описание:
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#delivery">
                                        <button class="btn btn-outline-primary">Доставка:
                                        </button>
                                    </a>
                                </li>
                                <li><a data-toggle="tab" href="#comments">
                                        <button class="btn btn-outline-primary"> Отзывы:
                                        </button>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="tab-pane fade in active product-description">
                                    <h3>Описание: </h3>
                                    <p>{{$good->description}}</p>
                                </div>
                                <div id="delivery" class="tab-pane fade">
                                    <h3>Доставка:</h3>
                                    <ul class="b">
                                        <li>Самовывоз из магазина (Одесса)</li>
                                        <li>На склад "Новой Почты" по тарифам оператора</li>
                                        <li>На склад "Укрпочты" по тарифам оператора</li>
                                    </ul>
                                </div>
                                <div id="comments" class="tab-pane fade">
                                    <h3>Отзывы:</h3>
                                    <div id="disqus_thread"></div>
                                    <script>

                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                        /*
                                         var disqus_config = function () {
                                         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                         };
                                         */
                                        (function () { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = 'https://webshop1.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a
                                                href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                                    </noscript>


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
