@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a></li>
                        <li> Категориия</li>
                        <li><a href="{{route('goodsByCategory', [$good->category_id])}}">{{$good->category->name}}</a>
                        </li>
                        <li>{{$good->name}}</li>
                    </ul>
                </div>
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
            @include('products.menuAndFilters')

            <!-- *** MENUS AND FILTERS END *** -->

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                @if(!empty($images[0]->filename))
                                    <?php $mainImage = $images[0]->filename; ?>

                                    <img src="{{asset("/uploads/goods/$mainImage")}}" alt="" class="img-responsive">
                                @else
                                    <img src="{{asset("/uploads/no_picture.jpg")}}" alt="" class="img-responsive">
                                @endif
                            </div>

                            @if($good->is_new)

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            @endif

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h2 class="text-center">{{$good->name}}</h2>
                                <p class="goToDescription"><a href="#details"
                                                              class="scroll-to">Артикл: {{$good->code}}</a>

                                <p class="goToDescription"><a href="#details"
                                                              class="scroll-to">Наличие: {{ ($good->is_avaliable)? 'В наличии' : 'Нет в наличии'}}</a>
                                </p>
                                <p class="price">{{$good->price}} грн</p>

                                <p class="text-center buttons">
                                    <button class="btn ajax-btn buttonBuy box btn-primary"
                                            data-good-id="{{ $good->id}}">
                                        <i class="fa fa-shopping-cart"></i> Добавить в корзину
                                    </button>
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to
                                        wishlist</a>
                                </p>

                            </div>

                            <div class="row" id="thumbs">
                                @if(!empty($images))
                                    @foreach($images as $image )
                                        <div class="col-xs-4">
                                            <a href="{{ asset("/uploads/goods/$image->filename") }}" class="thumb">
                                                <img src="{{ asset("/uploads/goods/$image->filename") }}"
                                                     alt="{{$image->id}}" class="img-responsive">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>

                    </div>

                    <div class="box" id="details">
                        <p>
                        <h4>Описание торава</h4>
                        <p>{{$good->description}}</p>

                        <hr>

                        <h4><i class="fa fas fa-truck"></i> Доставка:</h4>
                        <ul>
                            <li>Самовывоз из магазина (Одесса)</li>
                            <li>На склад "Новой Почты" по тарифам оператора</li>
                            <li>На склад "Укрпочты" по тарифам оператора</li>
                        </ul>

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


@endsection