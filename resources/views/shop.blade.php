@extends('template')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            @foreach($goods as $good)
                <div class="item col-xs-4 col-lg-4">
                    <a href="{{route('goodView',['id' => $good->id])}}">

                        <div class="goodImg" style="background-image: url({{ asset("/images/$good->image") }})">

                        </div>
                    </a>
                    <div class="description">
                        <p>{{$good->name}}</p>
                        <span class="goodDescription">
                        {{$good->description}}
                    </span>
                    </div>
                    <div class="goodAdditional">
                        <div class="col-xs-4 col-lg-4">
                            <p class="lead">
                                {{$good->price}} грн</p>
                        </div>

                        <div class="col-xs-4 col-lg-4 action">
                            <a href="{{action('CartController@actionAdd',['id' => $good->id])}}">
                                <button class="buttonBuy box" style=""><span>Купить </span>
                                </button>
                            </a>
                        </div>

                    </div>

                </div>

            @endforeach;

        </div>
    </div>
    <!-- /.container -->


@endsection
