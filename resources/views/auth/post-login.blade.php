@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

              <div class="panel panel-default">
                <div class="panel-heading"><h1>Tu información</h1></div>

                <div class="panel-body">


                    <div id="post-login" class="account-box">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- form -->

                        {!! Form::open(['url' => route('post_login_store')]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Apodo (no uses tu nombre verdadero)', ['class' => 'control-label']) !!}
                            {!! Form::text('name', $name) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('timezone', 'Zona Horaria', ['class' => 'control-label']) !!}
                            {!! Form::select('timezone', $timezone_list, $default_timezone) !!}
                        </div>
            

                        <div class="form-group">
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection