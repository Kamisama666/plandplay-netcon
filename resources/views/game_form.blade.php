@extends('layouts.app')

@section('content')

<style type="text/css">

.account-box

{

    border: 2px solid rgba(153, 153, 153, 0.75);

    border-radius: 2px;

    -moz-border-radius: 2px;

    -webkit-border-radius: 2px;

    -khtml-border-radius: 2px;

    -o-border-radius: 2px;

    z-index: 3;

    font-size: 13px !important;

    font-family: "Helvetica Neue" ,Helvetica,Arial,sans-serif;

    background-color: #ffffff;

    padding: 20px;

}

.logo

{

    background-position: 0 -4px;

    margin: -5px 0 17px 80px;

    position: relative;

    text-align: center;

    width: 138px;

}

</style>

<div class="container">

    <div class="row">

        <div class="col-md-4 col-md-offset-4">

            <div class="account-box">

                <div class="logo">

                    <img src="http://design.ubuntu.com/wp-content/uploads/ubuntu-logo32.png" width="80px" alt=""/>

                </div>

                <h1>Subir Partida</h1>

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

                {!! Form::open(['url' => route('game_store'), 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Titulo', ['class' => 'control-label']) !!}
                    {!! Form::text('title') !!}
                </div>
    
                <div class="form-group">
                    {!! Form::label('description', 'Descripcion', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description') !!}
                </div>

                <div class="form-group">    
                    {!! Form::label('game_image', 'Imagen de la partida', ['class' => 'control-label']) !!}
                    {!! Form::file('game_image') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('time_preference', 'Preferencia de fecha y Horario', ['class' => 'control-label']) !!}
                    {!! Form::text('time_preference') !!}
                </div>

                <div class="form-group">
                    {!! Form::label('duration_hours', 'Numero de Horas de duracion', ['class' => 'control-label']) !!}
                    {!! Form::number('duration_hours', 1) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('sessions_number', 'Numero de Sesiones', ['class' => 'control-label']) !!}
                    {!! Form::number('sessions_number', 1) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('maximum_players_number', 'Numero Maximo de Jugadores', ['class' => 'control-label']) !!}
                    {!! Form::number('maximum_players_number', 1) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('streamed', 'Sera emitida?', ['class' => 'control-label']) !!}
                    {!! Form::checkbox('streamed', 'streamed') !!}
                </div>

                <div class="form-group">    
                    {!! Form::label('stream_channel', 'Canal de Emision', ['class' => 'control-label']) !!}
                    {!! Form::text('stream_channel') !!}
                </div>

                <div class="form-group">
                {!! Form::submit('Enviar partida') !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>

@endsection