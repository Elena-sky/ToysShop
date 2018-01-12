@extends('admin.template')


@section('content')
    <!-- Page Content -->

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('adminPageView')}}">Админпанель</a>
                </li>
                <li class="breadcrumb-item active">Управление товарами</li>
            </ol>
            <!-- Area Chart Example-->

            <div class="container">
                <div class="row">
                    <div class="container ">
                        <a href="{{route('addNewProductPage')}}">

                            <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Добавить новый товар
                            </button>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Категория</th>
                                <th>Название</th>
                                {{--<th>Картинка</th>--}}
                                <th>Артикул</th>
                                {{--<th>Производитель</th>--}}
                                {{--<th>Описание</th>--}}
                                <th>Цена</th>
                                <th>NEW</th>
                                <th>Отображать</th>
                                <th>В наличии</th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($goods as $good )
                                <tr class="max-sunbol">
                                    <td>{{$category[$good->category_id]}}</td>
                                    <td>{{$good->name}}</td>
                                    {{--<td>{{$good->image}}</td>--}}
                                    <td>{{$good->code}}</td>
                                    {{--<td>{{$good->made}}</td>--}}
                                    {{--<td>{{$good->description}}</td>--}}
                                    <td>{{$good->price.' грн'}}</td>
                                    <td>{{($good->is_new)? 'Да':'Нет'}}</td>
                                    <td>{{($good->displaing)? 'Да':'Нет'}}</td>
                                    <td>{{($good->is_avaliable)? 'Да':'Нет'}}</td>
                                    <td>
                                        <a href="{{route('goodView', [$good->id])}}">
                                            <button type="button" class="btn btn-info"><span
                                                        class="glyphicon glyphicon-eye-open"></span> Обзор
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('productUpdateView', [$good->id])}}">
                                            <button type="button" class="btn btn-warning"><span
                                                        class="glyphicon glyphicon-pencil"></span> Изменить
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('actionDeleteProduct', [$good->id])}}">
                                            <button type="button" class="btn btn-danger"><span
                                                        class="glyphicon glyphicon-remove"></span> Удалить
                                            </button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{$goods->links()}}

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
