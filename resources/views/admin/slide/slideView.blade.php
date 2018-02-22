@extends('admin.template')


@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item active"><i class="fa  fa-fw fa-picture-o"></i> Управление слайдерами</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row">
                @can('Sliders-Create')
                    <div class="col-md-12 form-group">
                        <a href="{{route('viewSlideAdd')}}">
                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Добавить новый слайд
                            </button>
                        </a>
                    </div>
                @endcan

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>Картинка</th>
                            <th>Имя файла</th>
                            <th>Отображать</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slide )
                            <tr class="max-sunbol">

                                <td>{{$slide->id}}</td>

                                <td><img src="{{ asset("/uploads/sliders/$slide->filename") }}" width="189"></td>

                                <td>{{$slide->filename}}</td>

                                <td>{{($slide->displaing)? 'Да':'Нет'}}</td>

                                <td>
                                    @can('Sliders-Edit')
                                        <a href="{{route('viewSlideUpdate', [$slide->id])}}">
                                            <button type="button" class="btn btn-warning"><span
                                                        class="glyphicon glyphicon-pencil"></span> Изменить
                                            </button>
                                        </a>
                                    @endcan
                                </td>

                                <td>
                                    @can('Sliders-Delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['actionSlideDelete', $slide->id] ]) !!}
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
