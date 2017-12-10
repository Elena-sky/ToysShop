@extends('template')

@section('content')
    <!-- Page Content -->

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($items))

                        @foreach($items as $row)
                            <tr data-item-id="{{$row->id}}">
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <div class="goodImg"
                                             style=" width: 72px; height: 72px; background-image: url({{ asset("/uploads/".\App\Http\Controllers\CartController::getGoodMainImage($row->id)) }})">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">{{$row->name}}</a></h4>
                                            <h5 class="media-heading"> Производитель: <a href="#">{{$row->made}}</a>
                                            </h5>
                                            <span>Status: </span><span
                                                    class="text-success"><strong>In Stock</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">

                                    <input type="number" class="form-control itemCount" value="{{$row->qty}}">

                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{{$row->price}} грн</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>total</strong></td>
                                <td class="col-sm-1 col-md-1">

                                    <button type="button" class="btn btn-danger ajax-btn-remove"
                                            data-row-id="{{$row->id}}">
                                        <span>Удалить</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <span><h1>Корзина пустая</h1></span>
                        </tr>
                    @endif
                    {{--<tr>--}}
                    {{--<td>  </td>--}}
                    {{--<td>  </td>--}}
                    {{--<td>  </td>--}}
                    {{--<td><h5>Subtotal</h5></td>--}}
                    {{--<td class="text-right"><h5><strong>{{Cart::subtotal()}} грн</strong></h5></td>--}}
                    {{--</tr>--}}
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{Cart::total()}} грн</strong></h3></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </button>
                        </td>
                        <td>
                            <a href="{{route('viewCheckout')}}">
                                <button type="button" class="btn btn-success">
                                    Checkout
                                </button>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- /.container -->


@endsection
