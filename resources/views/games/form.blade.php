@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

              <div class="panel panel-default">
                <div class="panel-heading"><h1>Subir partida</h1></div>

                <div class="panel-body">

                    <p><a href="{{route('home')}}">< Volver a mis partidas</a></p>

                    <div id="sube-partida" class="account-box">
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
                            {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
                            <small id="title" class="form-text text-muted">
                                Nombre de la partida
                            </small>
                            {!! Form::text('title','',['class' => 'form-control']) !!}
                        </div>
            
                        <div class="form-group">
                            {!! Form::label('description', 'Descripcion', ['class' => 'control-label']) !!}
                            <small id="description" class="form-text text-muted">
                                Información para la partida que pueda interesar a los posibles participantes en la partida: argumento, ambientación, peculiaridades,... Si vas a utilizar un sistema distinto del original del juego aquí es un buen sitio para advertirlo.
                            </small>
                            {!! Form::textarea('description','',['class' => 'form-control','placeholder'=>'Escribe hasta 5000 caracteres']) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('game_system', 'Sistema de Juego', ['class' => 'control-label']) !!}
                            {!! Form::text('game_system','',['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('platform', 'Plataforma de Juego', ['class' => 'control-label']) !!}
                             <small id="platform" class="form-text text-muted">
                                Informa a tus jugadoras que plataforma usareis para comunicaros durante la partida Fantasy Grounds, Roll20, Hangout, Skype, Discord, Telegram, Radiotelegrafo de Hilos, Telepatia Arcana,... 
                            </small>
                            {!! Form::text('platform','',['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">    
                            {!! Form::label('game_image', 'Imagen de la partida', ['class' => 'control-label']) !!}
                            {!! Form::file('game_image') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time_preference', 'Preferencia de fecha y Hora', ['class' => 'control-label']) !!}
                             <small id="time_preference" class="form-text text-muted">
                               Preferencias y/o disponibilidad para la partida junto con la zona horaria a la que te refieres, por ej.: sabado a las 17:00 GMT+1, cualquier noche o a partir del viernes. Esto nos servirá para ubicar tu partida en la parrilla de juego. Recuerda que las jornadas duran del 28 de Marzo al 1 de Abril.
                            </small>
                            {!! Form::text('time_preference','',['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('duration_hours', 'Número de Horas de duracion', ['class' => 'control-label']) !!}
                             <small id="platform" class="form-text text-muted">
                               Duración aproximada de la sesión en horas 
                            </small>
                            {!! Form::number('duration_hours', 1,['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sessions_number', 'Numero de Sesiones', ['class' => 'control-label']) !!}
                            <small id="sessions_number" class="form-text text-muted">
                               Numero de sesiones de la partida, en la mayoría de los casos sera 1
                            </small>
                            {!! Form::number('sessions_number', 1,['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('maximum_players_number', 'Número Maximo de Jugadores', ['class' => 'control-label']) !!}
                            {!! Form::number('maximum_players_number', 1,['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('streamed', '¿Se emitirá la partida?', ['class' => 'control-label']) !!}
                            Si {!! Form::checkbox('streamed', 'streamed') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('beginner_friendly', '¿Partida de iniciación?', ['class' => 'control-label']) !!}
                            Si {!! Form::checkbox('beginner_friendly', 'beginner_friendly') !!}
                        </div>

                        <div class="form-group">    
                            {!! Form::label('stream_channel', 'Canal de Emision', ['class' => 'control-label']) !!}
                            <small id="stream_channel" class="form-text text-muted">
                               Si va a ser emitida indicanos la url del canal de emisión
                            </small>
                            {!! Form::text('stream_channel','',['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                        {!! Form::submit('Enviar partida',['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection