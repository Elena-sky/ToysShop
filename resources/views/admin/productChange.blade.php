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
                <div class="container ">
                    <a href="{{route('addNewProductPage')}}">

                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Добавить новый товар
                        </button>
                    </a>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Категория</th>
                            <th>Название</th>
                            {{--<th>Картинка</th>--}}
                            <th>Артикул</th>
                            {{--<th>Производитель</th>--}}
                            {{--<th>Описание</th>--}}
                            <th>Цена</th>
                            <th>NEW</th>
                            <th>Отображать</th>
                            <th>В наличии</th>
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
                                    <a href="{{route('productUpdateView', [$good->id])}}">
                                        <button type="button" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-pencil"></span> Изменить
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('actionDeleteProduct', [$good->id])}}">
                                        <button type="button" class="btn btn-danger"><span
                                                    class="glyphicon glyphicon-remove"></span> Удалить
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$goods->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
