@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/game_show.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{route('home')}}">< Volver a mis partidas</a> | <a href="http://netcon.viruk.com/contacto" target="_blank">Contacto</a></div>

                <div id="game_view" class="panel-body" >
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{$game->title}}</h3>

                    <p>
                    @if ($game->image_name)
                                                <img 
                                                        class="image_game" 
                                                        src="{{route('storage_get', $game->image_name)}}" 
                                                        alt="{{$game->title}}" 
                                                        
                                                    >
                                                @else
                                                <img 
                                                        class="image_game" 
                                                        src="{{ asset('img/sin_imagen.png') }}" 
                                                        alt="{{$game->title}}" 
                                                        
                                                    >
                                                @endif
                    </p>
                    <div class="col-md-8 col-md-offset-2">
                         @if ($isOwner)
                            <p><strong>Status</strong>: {{$game->approved ? 'Aprobada' : 'Pendiente de aprobar'}}</p>
                        @endif
                        <p>{{$game->description}}</p>

                        <p><strong>Sistema de Juego</strong>: {{$game->game_system}}</p>

                        <p><strong>Plataforma de Juego</strong>: {{$game->platform}}</p>

                        <p><strong>Hora de inicio</strong>: {{$game->starting_time ? $game->starting_time->toDateTimeString() : null}}</p>

                        <p><strong>Numero de Horas de duracion</strong>: {{$game->duration_hours}}</p>

                        <p><strong>Numero de Sesiones</strong>: {{$game->sessions_number}}</p>

                        <p><strong>Numero Maximo de Jugadores</strong>: {{$game->maximum_players_number}}</p>
                        
                        <p><strong>Emitida</strong>: {{$game->streamed ? 'Si' : 'No'}}</p>

                        @if ($game->stream_channel)
                        <p><strong>Canal de Emision</strong>: {{$game->stream_channel}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
