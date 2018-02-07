@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Contact</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                @include('info.pagesMenu')

                    <!-- *** PAGES MENU END *** -->


                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
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

                        <hr>

                        <div id="map">

                        </div>

                        <hr>
                        <h2>Контактная форма</h2>

                        {!! Form::open(['id' => 'contactform', 'method' => 'POST', 'class' => 'validateform']) !!}
                        {{ csrf_field() }}

                        <div id="sendmessage" style="display:none;">

                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="box">

                                    <p class="text-center">
                                        <img src="img/logo.png" alt="Obaju template">

                                    <h4>Ваше сообщение отправлено!</h4>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div id="senderror" style="display:none;">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="box">

                                    <p class="text-center">
                                        <img src="img/logo.png" alt="Obaju template">
                                    </p>

                                    <h3>При отправке сообщения произошла ошибка. </h3>

                                    <p class="text-center">Продублируйте его, пожалуйста, на почту администратора
                                        <span>{{ env('MAIL_ADMIN_EMAIL') }}</span></p>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <input name="id" type="hidden" value="{{$user->id ?? ''}}">

                            <div class="col-sm-6 field">
                                    <div class="form-group">
                                        {!! Form::label('userName', 'Имя:') !!}
                                        {!! Form::text('name', $user->name ?? '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                            <div class="col-sm-6 field">
                                    <div class="form-group">
                                        {!! Form::label('userEmail', 'Email:') !!}
                                        {!! Form::text('email', $user->email ?? '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            <div class="col-sm-6 field">
                                    <div class="form-group">
                                        {!! Form::label('userSubject', 'Тема:') !!}
                                        {!! Form::text('subject', '', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            <div class="col-sm-12 field">
                                    <div class="form-group">
                                        {!! Form::label('userMessage', 'Message:') !!}
                                        {!! Form::textarea('message', '', ['placeholder' => 'Ваше сообщение...','class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <span class="pull-right margintop20">* Заполните, пожалуйста, все обязательные поля!</span>
                                    <br>

                                    {{ Form::button('<i class="fa fa-envelope-o"></i>Отправить', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                                </div>
                            </div>
                            <!-- /.row -->
                        {!! Form::close() !!}


                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->



@endsection