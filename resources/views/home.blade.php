@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('game_post')}}">¡Registra una partida!</a>
                    
                    <br>

                    <h3>Partidas registradas: </h3>

                    @if ($user->games()->count())
                        <ul>
                        @foreach($user->games as $game)
                            <li>
                                <a href="{{route('game_view', $game->id)}}">{{$game->title}}</a> 
                                ({{$game->approved ? 'Aprobada' : 'Pendiente de aprobar'}})
                            </li>
                        @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
