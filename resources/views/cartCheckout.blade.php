@extends('template')

@section('content')
    <!-- Page Content -->

    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h3>Оформление заказа</h3>
                {!! Form::model('', array('route' => array('viewSaveCheckout'))
                    ) !!}

                <div class="form-group">
                    {!! Form::label('username', 'Имя и фамилия') !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('username', 'Город') !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('username', 'Мобильный телефон') !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                </div>


                <div class="form-group ">
                    <div class="col-sm-offset-2 col-sm-10 btn btn-success">
                        {!! Form::submit('Оформить заказ') !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>



    <!-- /.container -->


@endsection
