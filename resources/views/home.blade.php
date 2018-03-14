@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Mis partidas</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (env('GAME_REGISTRATION_ENABLED', false))
                    <p style="text-align: center;">
                        <a class="btn btn-primary" href="{{route('game_post')}}">¡SUBE UNA NUEVA PARTIDA!</a>
                    </p>
                    @endif
                    
                    <p style="text-align: center;">
                    Si tienes cualquier duda o comentario ponte en <a href="http://netcon.viruk.com/contacto" target="_blank"> contacto con nosotros</a>
                    </p>

                    <h3>Partidas subidas: </h4>
                    
                     @if ($user->games()->count())

                        <table class="table table-hover table-condensed  listado">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Juego</th>
                                    <th>Estado</th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->games as $game)
                                    <tr>
                                         <td width="15%">
                                            <a href="{{route('game_view', $game->id)}}" title="Ver partida">
                                                @if ($game->image_name)
                                                <img 
                                                        class="image_game" 
                                                        src="{{route('storage_get', $game->image_name)}}" 
                                                        alt="{{$game->title}}" 
                                                        width="100%" 
                                                    >
                                                @else
                                                <img 
                                                        class="image_game" 
                                                        src="{{ asset('img/sin_imagen.png') }}" 
                                                        alt="{{$game->title}}" 
                                                        width="100%" 
                                                    >
                                                @endif
                                            </a>
                                        </td>    
                                        <td width="45%">
                                            <a href="{{route('game_view', $game->id)}}" title="Ver partida" >{{$game->title}}</a>
                                        </td>
                                        <td width="25%">
                                            {{$game->game_system}}
                                        </td>
                                        <td width="15%">
                                            {{$game->approved ? 'Aprobada' : 'Pendiente'}}
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>

                    @endif

                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
