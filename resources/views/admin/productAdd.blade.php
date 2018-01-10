@extends('admin.template')


@section('content')
    <!-- Page Content -->



    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('adminPageView')}}">Админпанель</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('productView')}}">Управление товарами</a>
                </li>
                <li class="breadcrumb-item active">Добавить новый товар</li>
            </ol>
            <!-- Area Chart Example-->


            <div class="container">

                <div class="row " style="display: inline-block;width: 100%;">
                    {!! Form::model('', array('route' => array('actionNewAddProduct'), 'files' => true)
                    ) !!}

                    <div class="form-group">
                        {!! Form::label('productName', 'Название:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productCode', 'Код:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('code', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productMade', 'Производитель:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('made', 'Китай', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productCategory', ' Категория товара:') !!}
                        <div class="col-sm-10">
                            {!! Form::select('category_id', $categories, ['class' => 'form-control'])!!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productPrice', 'Цена:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('price', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productImage', 'Изображение:') !!}
                        <div class="col-sm-10">
                            {!! Form::file('images[]', ['multiple' => true])!!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productNew', 'Значок Новинка:') !!}
                        <div class="col-sm-10">
                            {!! Form::radio('is_new', 1, true) !!} Отобразить как новинку
                            {!! Form::radio('is_new', 0) !!} Отменить
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productA', 'Наличие товара:') !!}
                        <div class="col-sm-10">
                            {!! Form::radio('is_avaliable', 1, true) !!} В наличии
                            {!! Form::radio('is_avaliable', 0) !!} Нет в наличии
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productD', 'Отображение на странице:') !!}
                        <div class="col-sm-10">
                            {!! Form::radio('displaing', 1, true) !!} Отображать
                            {!! Form::radio('displaing', 0) !!} Не отображать
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productDescription', 'Описание:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('description', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-sm-offset-2 btn btn-success">
                            {!! Form::submit('Добавить товар') !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
