@extends('template')

@section('content')



    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a></li>
                        </li>
                        <li> Категории
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
    _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                @foreach(\App\Categories::where('status', 1)->get() as $category)

                                    <li>
                                        <a href="/category/{{$category->id}}">{{$category->name}} <span
                                                    class="badge pull-right">42</span></a>
                                    </li>
                                @endforeach

                                <li class="active">
                                    <a href="category.html">Ladies <span class="badge pull-right">123</span></a>
                                </li>

                            </ul>

                        </div>
                    </div>


                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong>25</strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong> <a href="#"
                                                                         class="btn btn-default btn-sm btn-primary">12</a>
                                                <a href="#" class="btn btn-default btn-sm">24</a> <a href="#"
                                                                                                     class="btn btn-default btn-sm">All</a>
                                                products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">


                        @foreach($goods as $good)
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            @if(isset($good->goodImg[1]->filename))
                                                <div class="front">
                                                    <a href="{{route('goodView',['id' => $good->id])}}">
                                                        <img src="{{asset("/uploads/goods/".$good->goodImg[0]->filename) }}"
                                                             alt="{{$good->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back">
                                                    <a href="{{route('goodView',['id' => $good->id])}}">
                                                        <img src="{{url( asset("/uploads/goods/".$good->goodImg[1]->filename)) }}"
                                                             alt="{{$good->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                            @elseif(isset($good->goodImg[0]->filename))
                                                <div class="front">
                                                    <a href="{{route('goodView',['id' => $good->id])}}">
                                                        <img src="{{asset("/uploads/goods/".$good->goodImg[0]->filename) }}"
                                                             alt="{{$good->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back">
                                                    <a href="{{route('goodView',['id' => $good->id])}}">
                                                        <img src="{{url( asset("/uploads/goods/".$good->goodImg[0]->filename)) }}"
                                                             alt="{{$good->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="front">
                                                    <a href="{{route('goodView',['id' => $good->id])}}">
                                                        <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                             alt="no_picture" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back">
                                                    <a href="{{route('goodView',['id' => $good->id])}}">
                                                        <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                             alt="no_picture" class="img-responsive">
                                                    </a>
                                                </div>
                                            @endif

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
                                    <div class="text">
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

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        {{$goods->links()}}
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection