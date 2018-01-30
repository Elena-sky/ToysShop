@extends('admin.template')

@section('content')
    <!-- Page Content -->

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('adminPageView')}}">Админпанель</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('viewCategory')}}">Управление категориями</a>
            </li>
            <li class="breadcrumb-item active">Редактировать категорию</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {!! Form::model($category, array('route' => array('actionSaveUpdateCategory'), 'files' => true)
                ) !!}
                <input name="id" type="hidden" value="{{$category->id}}">

                <div class="form-group">
                    {!! Form::label('categoryName', 'Название:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('currentImage', 'Текущее изображение:') !!}
                    <div class="col-sm-10">
                        <img src="{{ asset("/uploads/category/$category->image") }}" width="300">
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('newImage', 'Поменять изображение:') !!}
                    <div class="col-sm-10">
                        {!! Form::file('image')!!}
                    </div>
                </div>

                {{--<div class="form-group ">--}}
                {{--{!! Form::label('categorySortOrder', 'sort_order:') !!}--}}
                    {{--<div class="col-sm-10">--}}
                {{--{!! Form::text('code', $category->sort_order, ['class' => 'form-control']) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group ">
                    {!! Form::label('productStatus', 'Статус:') !!}
                    <div class="col-sm-10">
                        {!! Form::radio('status', 1) !!} Отображать
                        {!! Form::radio('status', 0) !!} Не отображать
                    </div>
                </div>

                <div class="form-group ">
                    <div class=" col-sm-10">
                        <h3>{{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}
                        </h3>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection