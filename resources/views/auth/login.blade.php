@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-defaultl" id="panel-login">
                <div class="panel-heading">
                    <h3>BIENVENIDX A NETCONPlay</h3>
                     <p>
                        <img src="{{ asset('img/logo-netconplay.png') }}">
                    </p>
                </div>
                <div class="panel-body">
                     <p>
                        Bienvenid@ a NETCONPlay, la <strong>plataforma de gestión de partidas de las <a href="http://netcon.viruk.com" title="Visitar netcon.viruk.vom" target="_blank">NETCON18</a>.</strong> Para registrar tus partidas o acceder a las que ya has subido solo tienes que entrar con tu cuenta de Google.
                    </p>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <p>
                                <a href="{{ url('/auth/google') }}" class="btn btn-danger">
                                    Login con Google
                                </a>
                           
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
