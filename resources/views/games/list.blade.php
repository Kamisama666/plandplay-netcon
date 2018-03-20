@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('scripts')
 <script src="{{ asset('js/game_list.js') }}"></script> 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Partidas</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p style="text-align: center;">
                    Si tienes cualquier duda o comentario ponte en <a href="http://netcon.viruk.com/contacto" target="_blank"> contacto con nosotros</a>
                    </p>

                    <br>

                    <p>si estáis registrados en la página os saldrá el horario en el huso con el que os hayáis registrado, sino saldrá en GMT+1</p>

                    <br>

                    <div class="col-md-10 col-md-offset-1">
                        <a href="{{route('game_list') . '?date=2018-03-28'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Miercoles</a>
                        <a href="{{route('game_list') . '?date=2018-03-29'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Jueves</a>
                        <a href="{{route('game_list') . '?date=2018-03-30'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Viernes</a>
                        <a href="{{route('game_list') . '?date=2018-03-31'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Sabado</a>
                        <a href="{{route('game_list') . '?date=2018-04-01'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Domingo</a>
                    </div>   

                    <table class="table">
                        <thead>
                            <tr>
                               <th>Titulo</th>
                               <th>Juego</th>
                               <th>Estado</th>
                               <th>Hora de Inicio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <td>
                                        <a href="{{route('game_view', ['game' => $game])}}">{{$game->title}}</a>
                                    </td>
                                    <td>{{$game->game_system}}</td>
                                    <td>
                                    {{
                                        $game->isPartial()
                                        ? 'Parcial'
                                        : ( $game->maximum_players_number <= $game->signedup_players_number 
                                        ? 'Lleno' 
                                        : 'Disponible' )
                                    }}
                                    </td>
                                    <td>{{
                                        $game->starting_time
                                            ? (new Date($game->starting_time->setTimezone($user_timezone)->toDateTimeString()))->format('l j F Y H:i')
                                            : null
                                    }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $games->appends(request()->except('page'))->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
