@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    
                <div class="panel-heading"><h3>Partida guardada</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>La solicitud para tu partida ha sido enviada.</p>
                    <p>Te avisaremos una vez haya sido aprobada.</p>
                    <p><a href="{{route('game_post')}}">Enviar otra partida</a> | <a href="{{route('home')}}">Ver mis partidas</a></p>    

                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
