@extends('admin.template')


@section('content')

    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('adminPageView')}}">Админ-панель</a>
                </li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">26 New Messages!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">{{$countProduct}} Товаров</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('productView')}}">
                            <span class="float-left">Смотреть детальнее</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">{{$countNewOrders}} New Заказов!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('viewAllOrders')}}?isnew=1">
                            <span class="float-left">Смотреть детальнее</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-users"></i>
                            </div>
                            <div class="mr-5">{{$countUser}} Покупателей</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('viewUsers')}}">
                            <span class="float-left">Смотреть детальнее</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
            </div>

        <div class="row">
                <div class="col-lg-8">

                    <!-- Card Columns Example Social Feed-->
                    <div class="mb-0 mt-4">
                        <i class="fa fa-newspaper-o"></i> Последних 8 новых продуктов
                    </div>
                    <hr class="mt-2">
                    <div class="card-columns">

                    @foreach($lastNewGoods as $newGood)
                        <!-- Last New Goods Card-->
                        <div class="card mb-3">
                            <a href="#">
                                @if(isset($newGood->goodImg[0]->filename))
                                    <img style=" max-width: 300px !important; margin-left: auto; margin-right: auto; display: block;"
                                         class="card-img-top img-fluid w-100"
                                         src="{{asset("/uploads/goods/".$newGood->goodImg[0]->filename) }}"
                                         alt="{{$newGood->name}}">
                                @else
                                    <img style=" max-width: 300px !important; margin-left: auto; margin-right: auto; display: block;"
                                         src="{{ asset("/uploads/no_picture.jpg") }}"
                                         alt="no_picture" class="img-responsive">
                                @endif

                            </a>
                            <div class="card-body">
                                <h6 class="card-title mb-1"><a
                                            href="{{route('goodView',['id' => $newGood->id])}}">{{$newGood->name}}</a>
                                </h6>
                                <p class="card-text small">
                                    {{$newGood->price}} грн
                                </p>
                            </div>

                            <div class="card-footer small text-muted">{{$newGood->created_at}}</div>
                        </div>

                        @endforeach

                    </div>
                    <!-- /Card Columns-->
                </div>
                <div class="col-lg-4">
                    <!-- Example Pie Chart Card-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-fw fa-sitemap"></i> Категории на сайте
                        </div>

                        <div class="list-group">
                            @foreach($categories as $category)
                                <a href="/category/{{$category->id}}" class="list-group-item list-group-item-action">
                                    <?=($category->status) ? "<i class='fa fa-check-square'></i>" : "<i class='fa fa-minus-square'></i>" ?>

                                    {{$category->name}}

                                    <span class="badge badge-secondary badge-pill">
                                    {{App\Goods::where('category_id', '=', $category->id)->count()}}
                                </span>
                                </a>
                            @endforeach

                        </div>

                        <div class="card-footer small text-muted">
                            <i class='fa fa-check-square'></i> - Видны;
                            <i class='fa fa-minus-square'></i> - Не видны
                        </div>
                    </div>

                </div>
            </div>

    </div>

@endsection
