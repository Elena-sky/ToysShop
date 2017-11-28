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
                    <a href="{{route('viewCategory')}}">Управление категориями</a>
                </li>
                <li class="breadcrumb-item active">Редактировать категорию</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="container">
                <div class="row " style="display: inline-block;width: 100%;">
                    {!! Form::model($category, array('route' => array('actionSaveUpdateCategory'))
                    ) !!}
                    <input name="id" type="hidden" value="{{$category->id}}">


                    <div class="form-group">
                        {!! Form::label('categoryName', 'Название:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('categorySortOrder', 'sort_order:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('code', $category->sort_order, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    {{--<div class="form-group ">--}}
                    {{--{!! Form::label('productCategory', ' Категория товара:') !!}--}}
                    {{--<div class="col-sm-10">--}}
                    {{--{!! Form::select('category_id', [$good->category_id], ['class' => 'form-control'])!!}--}}
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
                        <div class="col-sm-offset-2 col-sm-10 btn btn-success">
                            {!! Form::submit('Сохранить изминения') !!}
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