@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/game_show.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Partidas</div>

                <div id="game_view" class="panel-body" >
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{$game->title}}</h3>

                    <img 
                        class="image_game" 
                        src="{{route('storage_get', $game->image_name)}}" 
                        alt="{{$game->title}}" 
                    >
                    <br>

                    <div class="col-md-8 col-md-offset-2">
                         @if ($isOwner)
                            <p><b>Status</b>: {{$game->approved ? 'Aprovada' : 'Pendiente de aprovar'}}</p>
                        @endif
                        <p>{{$game->description}}</p>

                        <p><b>Sistema de Juego</b>: {{$game->game_system}}</p>

                        <p><b>Plataforma de Juego</b>: {{$game->platform}}</p>

                        <p><b>Hora de inicio</b>: {{$game->starting_time ? $game->starting_time->toDateTimeString() : null}}</p>

                        <p><b>Numero de Horas de duracion</b>: {{$game->duration_hours}}</p>

                        <p><b>Numero de Sesiones</b>: {{$game->sessions_number}}</p>

                        <p><b>Numero Maximo de Jugadores</b>: {{$game->maximum_players_number}}</p>
                        
                        <p><b>Emitida</b>: {{$game->streamed ? 'Si' : 'No'}}</p>

                        @if ($game->stream_channel)
                        <p><b>Canal de Emision</b>: {{$game->stream_channel}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
