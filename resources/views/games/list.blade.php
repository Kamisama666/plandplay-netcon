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
        <div class="col-md-8 col-md-offset-2">
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

                    <table id="games-table" class="table table-hover table-condensed listado">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Juego</th>
                                <th>Estado</th>
                                <th>Hora de inicio</th>  
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
