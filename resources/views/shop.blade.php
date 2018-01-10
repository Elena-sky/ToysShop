@extends('template')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            @foreach($goods as $good)
                <div class="item col-xs-4 col-lg-4">
                    <a href="{{route('goodView',['id' => $good->id])}}">
                        <div class="goodImg"
                             style="background-image: url({{ asset("/uploads/goods/".\App\Http\Controllers\CartController::getGoodMainImage($good->id)) }})">
                        </div>

                        <div class="description">
                            <p>{{$good->name}}</p>
                        </div>
                    </a>
                    <div class="goodAdditional">
                        <div class="action">
                            <span class="lead">{{$good->price}} грн</span>
                            <button class="btn-warning ajax-btn buttonBuy box" data-good-id="{{$good->id}}">
                                <span>в корзину</span>
                            </button>
                        </div>
                    </div>
                </div>

            @endforeach
            {{$goods->links()}}
        </div>
    </div>
    <!-- /.container -->


@endsection
