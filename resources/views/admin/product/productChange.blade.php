@extends('admin.template')

@section('content')

    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active">Управление товарами</li>
        </ol>
        <!-- Area Chart Example-->

        <div class="container">

            <div class="row">

                {{--{{ Form::open(['action' => ['SearchController@autocomplete'], 'method' => 'GET', 'class' => 'form-group']) }}--}}
                {{--{{ Form::text('search', '', ['id' =>  'sCode', 'placeholder' =>  'Поиск по артикулу...', 'class' => 'form-control mr-sm-2'])}}--}}
                {{--{{ Form::close() }}--}}

                <div class="col-md-12">
                    <div class="row form-group">
                        <div class="col-md-6">
                            @can('Product-Create')
                                <a href="{{route('addNewProductPage')}}">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Добавить новый товар
                                    </button>
                                </a>
                            @endcan
                        </div>
                        <div class="col-md-6 text-right">
                            <div>
                                <input type="text" class="form-control pull-right" id="search"
                                       placeholder="Поиск по таблице">
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped" id="mytable" cellspacing="0" style="width: 100%;">
                        <thead>
                        <tr class="table-info">
                            <th>Категория</th>
                            <th>Название</th>
                            <th>Артикул</th>
                            <th>Цена</th>
                            <th>NEW</th>
                            <th>Отображать</th>
                            <th>Наличие</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($goods as $good )
                            <tr class="max-sunbol">
                                <td>{{$category[$good->category_id]}}</td>
                                <td>{{$good->name}}</td>
                                {{--<td>{{$good->image}}</td>--}}
                                <td>{{$good->code}}</td>
                                {{--<td>{{$good->made}}</td>--}}
                                {{--<td>{{$good->description}}</td>--}}
                                <td>{{$good->price.' грн'}}</td>
                                <td>{{($good->is_new)? 'Да':'Нет'}}</td>
                                <td>{{($good->displaing)? 'Да':'Нет'}}</td>
                                <td>{{($good->is_avaliable)? 'Да':'Нет'}}</td>
                                <td>
                                    <a href="{{route('goodView', [$good->id])}}">
                                        <button type="button" class="btn btn-info"><span
                                                    class="glyphicon glyphicon-eye-open"></span> Обзор
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    @can('Product-Edit')
                                        <a href="{{route('productUpdateView', [$good->id])}}">
                                            <button type="button" class="btn btn-warning"><span
                                                        class="glyphicon glyphicon-pencil"></span> Изменить
                                            </button>
                                        </a>
                                    @endcan
                                </td>


                                <td>
                                    @can('Product-Delete')
                                        <a href="{{route('actionDeleteProduct', [$good->id])}}">
                                            <button type="button" class="btn btn-danger"><span
                                                        class="glyphicon glyphicon-remove"></span> Удалить
                                            </button>
                                        </a>
                                        {{--{!! Form::open(['method' => 'post', 'route' => ['actionDeleteProduct', $good->id] ]) !!}--}}
                                        {{--{!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}--}}
                                        {{--{!! Form::close() !!}--}}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                        <tr class="table-info">
                            <th>Категория</th>
                            <th>Название</th>
                            <th>Артикул</th>
                            <th>Цена</th>
                            <th>NEW</th>
                            <th>Отображать</th>
                            <th>Наличие</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                    {{$goods->links()}}

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
