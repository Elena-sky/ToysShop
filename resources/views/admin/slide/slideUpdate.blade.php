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
                    <a href="{{route('viewSliders')}}">Управление слайдерами</a>
                </li>
                <li class="breadcrumb-item active">Редактировать слайд</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="container">
                <div class="row adm-row">
                    {!! Form::model($slide, array('route' => array('actionSlideSave', $slide->id), 'files' => true)
                    ) !!}

                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group ">
                        {!! Form::label('slideImage', 'Текущее изображение:') !!}
                        <div class="col-sm-10">
                            <img src="{{ asset("/uploads/sliders/$slide->filename") }}" width="400">
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('sliderDisplaing', 'Отображение на странице:') !!}
                        <div class="col-sm-10">
                            {!! Form::radio('displaing', 1) !!} Отображать
                            {!! Form::radio('displaing', 0) !!} Не отображать
                        </div>
                    </div>

                    {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->

@endsection
