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
            <li class="breadcrumb-item active">Добавить новую категорию</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row " style="display: inline-block;width: 100%;">
                {!! Form::model('', array('route' => array('adminActionAddCategory'))
                ) !!}

                <div class="form-group">
                    {!! Form::label('categoryName', 'Название:') !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                </div>

                {{--<div class="form-group ">--}}
                {{--{!! Form::label('categorySortOrder', 'Сортировка?') !!}--}}
                    {{--<div class="col-sm-10">--}}
                {{--{!! Form::radio('code', 1) !!} да--}}
                {{--{!! Form::radio('code', 0, true) !!} Нет--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group ">
                    {!! Form::label('productStatus', 'Отображать') !!}
                    <div class="">
                        {!! Form::radio('status', 1, true) !!} Да
                        {!! Form::radio('status', 0) !!} Нет
                    </div>
                </div>

                <div class="form-group ">
                    <div class=" col-sm-10">
                        <h3>{{ Form::button('Создать категорию', ['class' => 'badge badge-success', 'type' => 'submit']) }}
                        </h3>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- /.container-fluid-->

@endsection