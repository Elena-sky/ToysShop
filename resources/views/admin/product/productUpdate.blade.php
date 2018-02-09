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
            <div class="row " style="display: inline-block;width: 100%;">
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

                        <style>
                            img {
                                padding: 4px;
                                background-color: #fff;
                                border: 1px solid #ddd;
                                border-radius: 4px;
                            }

                            .close {
                                position: absolute;
                                opacity: 20;
                                right: 0px;
                                width: 30px;
                                height: 30px;
                                background-color: #efefef;
                                z-index: 5;
                                -webkit-transition: opacity 150ms;
                                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAiElEQVR42r2RsQrDMAxEBRdl8SDcX8lQPGg1GBI6lvz/h7QyRRXV0qUULwfvwZ1tenw5PxToRPWMC52eA9+WDnlh3HFQ/xBQl86NFYJqeGflkiogrOvVlIFhqURFVho3x1moGAa3deMs+LS30CAhBN5nNxeT5hbJ1zwmji2k+aF6NENIPf/hs54f0sZFUVAMigAAAABJRU5ErkJggg==) no-repeat;
                                text-align: right;
                                border: 0;
                                cursor: pointer;
                            }

                            .close:hover, .close:focus {
                                background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAqklEQVR4XqWRMQ6DMAxF/1Fyilyj2SmIBUG5QcTCyJA5Z8jGhlBPgRi4TmoDraVmKFJlWYrlp/g5QfwRlwEVNWVa4WzfH9jK6kCkEkBjwxOhLghheMWMELUAqqwQ4OCbnE4LJnhr5IYdqQt4DJQjhe9u4vBBmnxHHNzRFkDGjHDo0VuTAqy2vAG4NkvXXDHxbGsIGlj3e835VFNtdugma/Jk0eXq0lP//5svi4PtO01oFfYAAAAASUVORK5CYII=");
                            }

                            .content {
                                position: relative;
                                float: left;
                            }

                            .content:after {
                                content: '\A';
                                position: absolute;
                                width: 100%;
                                height: 100%;
                                top: 0;
                                left: 0;
                                background: rgba(0, 0, 0, 0.6);
                                opacity: 0;
                                transition: all 0.5s;
                                -webkit-transition: all 0.5s;
                            }

                            .content:hover:after {
                                opacity: 1;
                            }
                        </style>


                        <div class="row">
                            @if($images)
                                @foreach($images as $image )
                                    <div class="content clossable " id="Image1">

                                        <div class="close" data-img-id="{{$image->id}}"
                                             data-token="{{ csrf_token() }}"></div>

                                        <img style="max-height: 250px !important;"
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
