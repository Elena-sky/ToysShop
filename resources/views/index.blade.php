@extends('template')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <div class="jumbotron my-4"
             style="display: flex; display: flex;padding-top: 30px;padding-bottom: 30px;padding-right: 30px;padding-left: 30px;">
            <div class="col-xs-12 col-md-6 col-lg-6">
                <img src="{{ asset("/uploads/some/noviigod.jpg") }}">
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6" style="color: red; font-style: italic;">
                <h2> Готовимся к Новому году <br> вместе с Море Игрушек</h2>
                <p>Специальное новогодние предложение на весь ассортимент новогодних товаров: елки, елочные игрушки,
                    гирлянды, мишура, подвески, сувениры и открытки. Успей подготовиться к праздникам и создать дома
                    уютную новогоднюю атмосферу. </p>
            </div>

        </div>
        {{--<header class="jumbotron my-4">--}}
        {{--<h1 class="display-3">A Warm Welcome!</h1>--}}
        {{--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt--}}
        {{--possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam--}}
        {{--repellat.</p>--}}
        {{--<a href="#" class="btn btn-primary btn-lg">Call to action!</a>--}}
        {{--</header>--}}

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $item_class = ' active'; ?>
                @foreach($slides as $slide)
                    <div class="carousel-item <?= $item_class ?>">
                        <?php $item_class = ''; /* убираем 'active' для следующих */ ?>
                        <img class="d-block img-fluid" src="{{ asset("/uploads/sliders/$slide->filename") }}"
                             width="100%" alt="{{$slide->id}}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- Page Features -->
        <div class="row text-center">

            @foreach($categories as $category)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <a href="/category/{{$category->id}}">
                        <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$category->name}}</h4>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

