@extends('template')

@section('content')
    <!-- Page Content -->

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Количество</th>
                        <th class="text-center">Цена</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($items))

                        @foreach($items as $row)
                            <tr data-item-id="{{$row->id}}">
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <img style=" width: 72px; height: 72px;"
                                             src="{{url( asset("/uploads/goods/".\App\Http\Controllers\CartController::getGoodMainImage($row->id))) }}"/>

                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">{{$row->name}}</a></h4>
                                            </h5>
                                            <span>Status: </span><span
                                                    class="text-success"><strong>In Stock</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">

                                    <input type="number" class="form-control itemCount" value="{{$row->qty}}">

                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>{{$row->price}} грн</strong>
                                </td>
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

                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h3>Итого:</h3></td>
                        <td class="text-right"><h3><strong> грн</strong></h3></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>
                            <a href="{{route('index')}}">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Продолжить покупки
                                </button>
                            </a>
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
