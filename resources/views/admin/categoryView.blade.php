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
                <li class="breadcrumb-item active">Управление категориями</li>
            </ol>
            <!-- Area Chart Example-->


            <div class="container">

                <div class="row">


                    <div class="container ">
                        <a href="{{route('addCategory')}}">
                            <button type="button" class="btn btn-primary">Добавить новую категорию</button>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Сортировка?</th>
                                <th>Статус</th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category )
                                <tr class="max-sunbol">
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->sort_order}}</td>
                                    <td>{{$category->status}}</td>

                                    <td>
                                        <a href="{{route('viewUpdateCategory', [$category->id])}}">
                                            <button type="button" class="btn btn-warning">Изменить</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('actionDeleteCategory', [$category->id])}}">
                                            <button type="button" class="btn btn-danger">Удалить</button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
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
