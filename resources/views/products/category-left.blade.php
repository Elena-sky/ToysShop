@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a></li>
                        <li> Категориия</li>
                        <li> {{$categoryName->name}}</li>
                    </ul>
                </div>

                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
            @include('products.menuAndFilters')

            <!-- *** MENUS AND FILTERS END *** -->

                <div class="col-md-9">

                    <div class="row products">

                        @foreach($goods as $good)
                            <div class="col-md-4 col-sm-6">
                                <div class="product product-img">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front div-for-img">
                                                <a href="{{route('goodView',['id' => $good->id])}}">
                                                    @if(isset($good->goodImg[1]->filename))
                                                        <img src="{{asset("/uploads/goods/".$good->goodImg[0]->filename) }}"
                                                             alt="{{$good->name}}"
                                                             class="img-responsive goods-of-category">
                                                    @elseif(isset($good->goodImg[0]->filename))
                                                        <img src="{{asset("/uploads/goods/".$good->goodImg[0]->filename) }}"
                                                             alt="{{$good->name}}"
                                                             class="img-responsive goods-of-category">
                                                    @else
                                                        <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                             alt="no_picture" class="img-responsive goods-of-category">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="back div-for-img">
                                                <a href="{{route('goodView',['id' => $good->id])}}">
                                                    @if(isset($good->goodImg[1]->filename))

                                                        <img src="{{url( asset("/uploads/goods/".$good->goodImg[1]->filename)) }}"
                                                             alt="{{$good->name}}"
                                                             class="img-responsive goods-of-category">
                                                    @elseif(isset($good->goodImg[0]->filename))
                                                        <img src="{{url( asset("/uploads/goods/".$good->goodImg[0]->filename)) }}"
                                                             alt="{{$good->name}}"
                                                             class="img-responsive goods-of-category">
                                                    @else
                                                        <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                             alt="no_picture" class="img-responsive goods-of-category">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{route('goodView',['id' => $good->id])}}" class="invisible">
                                        @if(isset($good->goodImg[0]->filename))
                                            <img src="{{asset("/uploads/goods/".$good->goodImg[0]->filename) }}"
                                                 alt="" class="img-responsive">
                                        @else
                                            <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                 alt="no_picture" class="img-responsive">
                                        @endif
                                    </a>
                                    <div class="text product-text">
                                        <h3><a href="{{route('goodView',['id' => $good->id])}}">{{$good->name}}</a></h3>
                                        <p class="price">{{$good->price}} грн</p>
                                        <p class="buttons">
                                            <a href="{{route('goodView',['id' => $good->id])}}" class="btn btn-default">Детальнее</a>
                                            <button type="button"
                                                    class="btn btn-primary product-quickview ajax-btn  box"
                                                    data-good-id="{{$good->id}}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </p>
                                    </div>
                                    <!-- /.text -->

                                    @if($good->is_new)
                                        <div class="ribbon new">
                                            <div class="theribbon">NEW</div>
                                            <div class="ribbon-background"></div>
                                        </div>
                                @endif
                                <!-- /.ribbon -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <!-- /.col-md-4 -->
                        @endforeach

                    </div>
                    <!-- /.products -->

                    <div class="pages">
                        {{$goods->links()}}
                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection