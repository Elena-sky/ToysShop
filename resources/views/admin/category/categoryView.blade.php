@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active"><i class="fa fa-fw fa-table"></i> Управление категориями</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">
                @can('Categories-Create')
                    <div class="col-md-12 form-group">
                    <a href="{{route('addCategory')}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Добавить новую категорию
                        </button>
                    </a>
                </div>
                @endcan

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr class="table-info">
                            <th>Название</th>
                            {{--<th>Сортировка?</th>--}}
                            <th>Изображение</th>
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
                                @if($category->image)
                                    <td><img src="{{ asset("/uploads/category/$category->image") }}" width="150"></td>
                                @else
                                    <td><img src="{{ asset("/uploads/no_picture.jpg") }}" width="150"></td>
                                @endif

                                <td>{{($category->status)? 'Да':'Нет'}}</td>

                                <td>
                                    <a href="{{route('goodsByCategory', [$category->id])}}">
                                        <button type="button" class="btn btn-info"><span
                                                    class="glyphicon glyphicon-eye-open"></span> Обзор
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    @can('Categories-Edit')
                                        <a href="{{route('viewUpdateCategory', [$category->id])}}">
                                            <button type="button" class="btn btn-warning"><span
                                                        class="glyphicon glyphicon-pencil"></span> Изменить
                                            </button>
                                        </a>
                                    @endcan
                                </td>

                                <td>
                                    @can('Categories-Delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['actionDeleteCategory', $category->id] ]) !!}
                                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
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
