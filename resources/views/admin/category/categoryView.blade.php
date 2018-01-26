@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active">Управление категориями</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">
                <div class="container ">
                    <a href="{{route('addCategory')}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Добавить новую категорию
                        </button>
                    </a>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr class="table-info">
                            <th>Название</th>
                            {{--<th>Сортировка?</th>--}}
                            <th>Отображать</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category )
                            <tr class="max-sunbol">
                                <td>{{$category->name}}</td>
                                {{--<td>{{$category->sort_order}}</td>--}}
                                <td>{{($category->status)? 'Да':'Нет'}}</td>
                                <td>
                                    <a href="{{route('goodsByCategory', [$category->id])}}">
                                        <button type="button" class="btn btn-info"><span
                                                    class="glyphicon glyphicon-eye-open"></span> Обзор
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('viewUpdateCategory', [$category->id])}}">
                                        <button type="button" class="btn btn-warning"><span
                                                    class="glyphicon glyphicon-pencil"></span> Изменить
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('actionDeleteCategory', [$category->id])}}">
                                        <button type="button" class="btn btn-danger"><span
                                                    class="glyphicon glyphicon-remove"></span> Удалить
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection
