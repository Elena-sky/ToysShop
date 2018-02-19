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
                            <div class="product slider-prod">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{route('goodView',['id' => $newGood->id])}}">
                                                @if(isset($newGood->goodImg[1]->filename))
                                                    <img src="{{asset("/uploads/goods/".$newGood->goodImg[0]->filename) }}"
                                                         alt="{{$newGood->name}}"
                                                         class="img-responsive slider-prod-img">
                                                @elseif(isset($newGood->goodImg[0]->filename))
                                                    <img src="{{asset("/uploads/goods/".$newGood->goodImg[0]->filename) }}"
                                                         alt="{{$newGood->name}}"
                                                         class="img-responsive slider-prod-img">
                                                @else
                                                    <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                         alt="no_picture" class="img-responsive slider-prod-img">
                                                @endif
                                                {{--class="img-responsive"--}}
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{route('goodView',['id' => $newGood->id])}}">
                                                @if(isset($newGood->goodImg[1]->filename))
                                                    <img src="{{url( asset("/uploads/goods/".$newGood->goodImg[1]->filename)) }}"
                                                         alt="{{$newGood->name}}"
                                                         class="img-responsive slider-prod-img">
                                                @elseif(isset($newGood->goodImg[0]->filename))
                                                    <img src="{{url( asset("/uploads/goods/".$newGood->goodImg[0]->filename)) }}"
                                                         alt="{{$newGood->name}}"
                                                         class="img-responsive slider-prod-img">
                                                @else
                                                    <img src="{{ asset("/uploads/no_picture.jpg") }}"
                                                         alt="no_picture" class="img-responsive slider-prod-img">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text slider-text">
                                    <h3><a href="{{route('goodView',['id' => $newGood->id])}}">{{$newGood->name}}</a>
                                    </h3>
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
        </div>
        <!-- /#content -->



@endsection