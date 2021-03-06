@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-defaultl" id="panel-login">
                <div class="panel-heading">
                    <h3>BIENVENID@ A NETCONPlay</h3>
                     <p>
                        <img src="{{ asset('img/2019-03-25.png') }}">
                    </p>
                </div>
                <div class="panel-body">
                     <p>
                        Bienvenid@ a NETCONPlay, la <strong>plataforma de gestión de partidas de las <a href="http://netconplay.com" title="Visitar netconplay.com" target="_blank">NETCON19</a>.</strong> Debes <a href="{{ route('register') }}" title="Registrarte en las Netcon" >registrarte</a> para subir tus partidas o acceder a las que ya has subido. Si ya estas registrado solo tienes que loguearte con tu dirección de correo y contraseña.
                    </p>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Te has olvidado de tu contraseña?
                                </a>
                            </div>
                        </div>

                        <p>
                                <a href="{{ route('register') }}" class="btn btn-danger">
                                    Registrar Nuevo Usuario
                                </a>

                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
