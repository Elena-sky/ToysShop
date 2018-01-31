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
                    <a href="/category/{{$category->id}}">
                        <div style="width: 300px; height: 300px;">
                            <img class="card-img-top" src="{{ asset("/uploads/category/$category->image") }}" alt="">

                        </div>
                        <h4>{{$category->name}}</h4>
                    </a>
            </div>
            @endforeach
        </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

