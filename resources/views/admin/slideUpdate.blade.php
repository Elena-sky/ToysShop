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
                <div class="row " style="display: inline-block;width: 100%;">
                    {!! Form::model($slide, array('route' => array('actionSlideSave'), 'files' => true)
                    ) !!}
                    <input name="id" type="hidden" value="{{$slide->id}}">

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

                    <div class="form-group ">
                        <div class=" col-sm-10">
                            <h3>{{ Form::button('Сохранить', ['class' => 'badge badge-success', 'type' => 'submit']) }}
                            </h3>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->

@endsection
