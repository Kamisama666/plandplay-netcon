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
                    Si tienes cualquier duda o comentario ponte en <a href="http://netconplay.com/contacto" target="_blank"> contacto con la organización</a>
                    </p>

                    <br>

                    <p>si estáis registradas en la página os saldrá el horario en el huso con el que os hayáis registrado. Si no, aparecerá en el huso de España</p>

                    <br>

                    <div class="col-md-10 col-md-offset-2">
                        <a href="{{route('game_list') . '?date=2019-04-17'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Miércoles</a>
                        <a href="{{route('game_list') . '?date=2019-04-18'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Jueves</a>
                        <a href="{{route('game_list') . '?date=2019-04-19'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Viernes</a>
                        <a href="{{route('game_list') . '?date=2019-04-20'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Sábado</a>
                        <a href="{{route('game_list') . '?date=2019-04-21'}}" type="button" class="btn col-md-2 btn-primary center-block" role="button">Domingo</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                               <th>Título</th>
                               <th>Juego</th>
                               <th>Organizador/a</th>
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
                                    <td><a href="{{route('game_list') . '?owner_id=' . $game->owner_id}}">{{$game->owner->name}}</a></td>
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
