@extends('layouts.app')

@section('scripts')
 <script>
$(document).ready(function() {
    $('.timepicker').datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY HH:mm',
        defaultDate: '04/17/2019 07:06'
    });
})
 </script>
@endsection

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

              <div class="panel panel-default">
                <div class="panel-heading"><h1>Subir partida</h1></div>

                <div class="panel-body">

                    <p><a href="{{route('home')}}">Volver a mi perfil</a></p>

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
                            {!! Form::label('platform', 'Plataforma de Juego y Requerimientos', ['class' => 'control-label']) !!}
                             <small id="platform" class="form-text text-muted">
                                Informa a tus jugadoras que plataforma usareis para comunicaros durante la partida y cuales son los requerimientos mínimos para jugar. Que usen video, Fantasy Grounds, Roll20, Hangout, Skype, Discord, Telegram, Radiotelegrafo de Hilos, Telepatia Arcana,...
                            </small>
                            {!! Form::text('platform','',['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('game_image', 'Imagen de la partida', ['class' => 'control-label']) !!}
                            {!! Form::file('game_image') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('starting_time', 'Fecha y Hora de inicio', ['class' => 'control-label']) !!}
                             <small id="starting_time" class="form-text text-muted">
                                Fecha y Hora de inicio para la partida. Asumiremos que la hora corresponde a la zona horaria que has configurado. Recuerda que las jornadas duran del 17 al 21 de Abril. Si la partida va a tener multiples sesiones, esta fecha es solo para la primera.
                            </small>
                            {!! Form::input('datetime-local', 'starting_time', null, ['class' => 'form-control timepicker ']) !!}
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
                            {!! Form::label('safety_tools', '¿Usa Herramientas de Seguridad?', ['class' => 'control-label']) !!}
                            Si {!! Form::checkbox('safety_tools', 'safety_tools') !!}
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