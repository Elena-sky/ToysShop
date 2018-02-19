@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a>
                        <li>Контакт-центр</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                @include('info.pagesMenu')

                <!-- *** PAGES MENU END *** -->

                </div>

                <div class="col-md-9">

                    <div class="box" id="contact">
                        <h1>Контакт-центр</h1>

                        <p class="lead">Вам что-то интересно? У вас есть какие-то вопросы нам?</p>
                        <p>Пожалуйста, не стесняйтесь обращаться.</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Адресс</h3>
                                <p>Одесса
                                    <br>Одеська область
                                    <br>проспект Добровольського
                                    <br>114/2
                                    <br>Северный рынок
                                    <br>
                                    <strong>Контейнер №Г14</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Центр обработки вызовов</h3>
                                <p class="text-muted"> Если у Вас возникли вопросы по товару или доставке - просто
                                    позвоните нам. Стоимость звонков согласно тарифам вашего оператора.</p>
                                <p><strong>+38 093 000 00 00</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Электронная поддержка</h3>
                                <p class="text-muted"> Пожалуйста, не стесняйтесь писать нам электронное письмо с
                                    использованием електронной формы связи.</p>
                                <ul>
                                    <li><strong><a href="mailto:">info-igrushki@gmail.com</a></strong>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection