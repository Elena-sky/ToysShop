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
                    <a href="{{route('viewUsers')}}">Управление пользователями</a>
                </li>
                <li class="breadcrumb-item active">Редактировать профиль пользователя</li>
            </ol>
            <!-- Area Chart Example-->


            <div class="container">

                <div class="row " style="display: inline-block;width: 100%;">
                    {!! Form::model($user, array('route' => array('actionSaveUser')) ) !!}
                    <input name="id" type="hidden" value="{{$user->id}}">


                    <div class="form-group">
                        {!! Form::label('productName', 'Имя:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group ">
                        {!! Form::label('productCode', 'E-Mail:') !!}
                        <div class="col-sm-10">
                            {!! Form::text('code', $user->email, ['class' => 'form-control']) !!}
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
