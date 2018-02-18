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
                <a href="{{route('productView')}}">Управление товарами</a>
            </li>
            <li class="breadcrumb-item active">Редактировать товар</li>
        </ol>
        <!-- Area Chart Example-->
        <div class="container">
            <div class="row adm-row">
                {!! Form::model($good, array('route' => array('actionUpdateSave'), 'files' => true)
                ) !!}
                <input name="id" type="hidden" value="{{$good->id}}">

                <div class="form-group">
                    {!! Form::label('productName', 'Название:') !!}
                    <div class="col-sm-12">
                        {!! Form::text('name', $good->name, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productCode', 'Код:') !!}
                    <div class="col-sm-12">
                        {!! Form::text('code', $good->code, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productMade', 'Производитель:') !!}
                    <div class="col-sm-12">
                        {!! Form::text('made', $good->made, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productCategory', ' Категория товара:') !!}
                    <div class="col-sm-12">
                        {!! Form::select('category_id', $category, $good->category_id, ['class'=> 'form-control'])!!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productPrice', 'Цена:') !!}
                    <div class="col-sm-12">
                        {!! Form::text('price', $good->price, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('currentImage', 'Текущие изобращения') !!}
                    <div class="col-sm-12">

                        <div class="row">
                            @if($images)
                                @foreach($images as $image )
                                    <div class="content clossable " id="Image1">

                                        <div class="close" data-img-id="{{$image->id}}"
                                             data-token="{{ csrf_token() }}"></div>

                                        <img id="pr-update"
                                             src="{{ asset("/uploads/goods/$image->filename") }}"
                                             alt="{{$image->id}}">
                                    </div>
                                @endforeach

                            @else
                                <div class="col-sm-4">
                                    <img src="{{ asset("/uploads/no_picture.jpg") }}" width="200px"
                                         alt="{{'no_picture'}}">
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productImage', 'Новое изображение:') !!}
                    <div class="col-sm-12">
                        {!! Form::file('images[]', ['multiple' => true])!!}
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productNew', 'Значок Новинка:') !!}
                    <div class="col-sm-12">
                        {!! Form::radio('is_new', 1) !!} Отобразить как новинку
                        {!! Form::radio('is_new', 0) !!} Отменить
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productA', 'Наличие товара:') !!}
                    <div class="col-sm-12">
                        {!! Form::radio('is_avaliable', 1) !!} В наличии
                        {!! Form::radio('is_avaliable', 0) !!} Нет в наличии
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productD', 'Отображение на странице:') !!}
                    <div class="col-sm-12">
                        {!! Form::radio('displaing', 1) !!} Отображать
                        {!! Form::radio('displaing', 0) !!} Не отображать
                    </div>
                </div>

                <div class="form-group ">
                    {!! Form::label('productDescription', 'Описание:') !!}
                    <div class="col-sm-12">
                        {!! Form::text('description', $good->description, ['class' => 'form-control']) !!}
                    </div>
                </div>

                {{ Form::button('Сохранить', ['class' => 'btn btn-success', 'type' => 'submit']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
