@extends('template')

@section('content')
    <!-- Page Content -->

    <style class="cp-pen-styles">


        h1, h2, h3 {
            text-transform: uppercase;
        }

        h2 {
            font-size: 1.5rem;
        }

        @media (max-width: 767px) {
            h2 {
                font-size: 1.2rem;
            }
        }

        h3 {
            font-weight: 500;
        }

        p {
            font-weight: 300;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .products {
            padding: 20px;
        }

        @supports (display: grid) {
            .products {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
                grid-gap: 2rem;
                grid-auto-rows: 600px;
                grid-auto-columns: 1fr;
                grid-auto-flow: dense;
            }

            @media (max-width: 900px) {
                .products {
                    grid-template-columns: repeat(2, 1fr);
                    grid-gap: 10px;
                    grid-auto-rows: auto;
                }
            }
        }

        .product {
            text-align: center;
            padding: 10px;
            float: left;
        }

        @media (max-width: 767px) {
            .product {
                width: 50%;
            }
        }

        @supports (display: grid) {
            .product {
                width: auto;
                padding: 0;
            }
        }

        .product-quickview {
            opacity: 0;
            transition: opacity 0.5s ease;
            display: block;
            font-size: 1rem;
            text-transform: uppercase;
            padding: 10px;
            border: 1px solid black;
            background-color: white;
        }

        .product-link {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-link:hover .product-quickview {
            opacity: 1;
        }

        .product-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: stretch;
        }

        @media (min-width: 768px) {
            .product-image {
                height: 450px;
            }
        }

        .product-tag {
            color: #A48CA2;
            margin: 5px 0;
        }

        .is-red {
            color: #A40802;
        }

        .product-title {
            margin: 5px 0;
            font-weight: 500;
        }

        .product-price {
            margin: 5px 0;
            font-weight: 300;
            font-size: 1.1rem;
        }

        .product-standard-price {
            text-decoration: line-through;
        }

        .product-promo {
            position: relative;
            overflow: hidden;
            float: left;
        }

        .promo-content-wrapper {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 10%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: stretch;
        }

        .promo-content {
            border: 1px solid white;
            padding: 10%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
            color: white;
            background-color: rgba(0, 0, 0, 0.15);
        }

        .promo-content a {
            font-weight: 300;
            text-decoration: underline;
        }

        @media (max-width: 767px) {
            .promo-content h1 {
                font-size: 1.25rem;
            }
        }

        @supports (display: grid) {
            .promo-span-row-2 {
                grid-row: span 2;
            }
        }

        .promo-span-column-2 {
            width: 40%;
        }

        @media (max-width: 767px) {
            .promo-span-column-2 {
                width: 100%;
            }
        }

        @supports (display: grid) {
            .promo-span-column-2 {
                width: auto;
                grid-column: span 2;
            }
        }

        .promo-span-column-3 {
            width: 60%;
        }

        @media (max-width: 767px) {
            .promo-span-column-3 {
                width: 100%;
            }
        }

        @supports (display: grid) {
            .promo-span-column-3 {
                width: auto;
                grid-column: span 3;
            }

            @media (max-width: 767px) {
                .promo-span-column-3 {
                    grid-column: span 2;
                }
            }
        }
    </style>


    <ul class="products">
        @foreach($goods as $good)

            <li class="product">
                <div class="product-link">
                    <div class="action">

                        <button type="button" class="product-quickview ajax-btn  box" data-good-id="{{$good->id}}">Добавить
                            в корзину
                        </button>
                    </div>

                    <a href="{{route('goodView',['id' => $good->id])}}">

                        @if(\App\Http\Controllers\CartController::getGoodMainImage($good->id))
                        <img src="{{url( asset("/uploads/goods/".\App\Http\Controllers\CartController::getGoodMainImage($good->id))) }}"/>
                        @else
                            <img src="{{ asset("/uploads/no_picture.jpg") }}" alt="{{'no_picture'}}">
                        @endif

                        <div class="product-info">
                            {{--<h3 class="product-tag">New</h3>--}}
                            <h2 class="product-title">{{$good->name}}</h2>
                            <p class="product-price">{{$good->price}} грн</p>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
    {{$goods->links()}}

    {{--need delete style buttonBuy--}}


@endsection
