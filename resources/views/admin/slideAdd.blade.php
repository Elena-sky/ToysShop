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
                <li class="breadcrumb-item active">Добавить новый слайд</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="container">
                <div class="row">
                    {!! Form::model('', array('route' => array('actionNewSlide'), 'files' => true)
                    ) !!}

                    <div class="form-group ">
                        {!! Form::label('sliderImage', 'Изображение:') !!}
                        <div class="col-sm-10">
                            {!! Form::file('images[]', ['multiple' => true])!!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('sliderDisplaing', 'Отображение на странице:') !!}
                        <div class="col-sm-10">
                            {!! Form::radio('displaing', 1, true) !!} Отображать
                            {!! Form::radio('displaing', 0) !!} Не отображать
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10 btn btn-success">
                            {!! Form::submit('Добавить товар') !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->

@endsection
