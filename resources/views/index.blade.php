@extends('template')

@section('content')

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">


                        <?php $item_class = 'img-responsive'; ?>
                        @foreach($slides as $slide)
                            <div class="item <?= $item_class; ?>">
                                <?php $item_class = ''; /* убираем 'active' для следующих */ ?>

                                <img class="img-responsive" src="{{ asset("/uploads/sliders/$slide->filename") }}"
                                     alt="{{$slide->id}}">

                            </div>
                        @endforeach


                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
    _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">

                        @foreach($categories as $category)
                            <a href="{{route('goodsByCategory',['id' => $category->id])}}">

                                <div class="col-sm-4">
                                    <div class="box same-height clickable" style="height: 200px; width: 100%;">
                                        <div>
                                            <img class=" img-rounded img-responsive"
                                                 src="{{ asset("/uploads/category/$category->image") }}"
                                                 alt="{{$category->name}}">
                                        </div>

                                        <p class="text-center">
                                        <h3>{{$category->name}}</h3></p>

                                    </div>
                                </div>

                            </a>
                        @endforeach

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** NEW PRODUCT SLIDESHOW ***
    _________________________________________________________ -->

            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Новинки</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">

                        @foreach($lastNewGoods as $newGood)
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{route('goodView',['id' => $newGood->id])}}">
                                                @if(isset($newGood->goodImg[1]->filename))
                                                    <img src="{{asset("/uploads/goods/".$newGood->goodImg[0]->filename) }}"
                                                         alt="{{$newGood->name}}" class="img-responsive">
                                                @elseif(isset($newGood->goodImg[0]->filename))
                                                    <img src="{{asset("/uploads/goods/".$newGood->goodImg[0]->filename) }}"
                                                         alt="{{$newGood->name}}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                         alt="no_picture" class="img-responsive">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{route('goodView',['id' => $newGood->id])}}">
                                                @if(isset($newGood->goodImg[1]->filename))
                                                    <img src="{{url( asset("/uploads/goods/".$newGood->goodImg[1]->filename)) }}"
                                                         alt="{{$newGood->name}}" class="img-responsive">
                                                @elseif(isset($newGood->goodImg[0]->filename))
                                                    <img src="{{url( asset("/uploads/goods/".$newGood->goodImg[0]->filename)) }}"
                                                         alt="{{$newGood->name}}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                         alt="no_picture" class="img-responsive">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html">{{$newGood->name}}</a></h3>
                                    <p class="price">
                                        {{$newGood->price}} грн
                                    </p>
                                </div>
                                <!-- /.text -->

                                @if($newGood->is_new)
                                <div class="ribbon new">
                                    <div class="theribbon">Новинка</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                                @endif
                            </div>
                            <!-- /.product -->
                        </div>

                    @endforeach
                        <!-- /.col-md-4 -->

                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** NEW END *** -->

            <!-- *** BLOG HOMEPAGE ***
    _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our blog</h3>

                        <p class="lead">What's new in the world of fashion? <a href="blog.html">Check our blog!</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Fashion now</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and
                                        style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada
                                    fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
                                    tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Who is who - example blog post</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada
                                    fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
                                    tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->



@endsection