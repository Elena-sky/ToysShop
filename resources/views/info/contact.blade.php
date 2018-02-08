@extends('template')

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Главная</a>
                        <li>Контактная форма</li>
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

                        <h2>Контактная форма</h2>

                        <p class="lead">Вам что-то интересно? У вас есть какие-то вопросы нам?</p>
                        <p>Пожалуйста, не стесняйтесь обращаться.</p>

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