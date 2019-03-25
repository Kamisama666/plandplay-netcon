@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre de Usuario</label>

                            <div class="col-md-8">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de Correo</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="age_confirm" class="col-md-4 control-label">Confirmo que soy mayor de edad</label>
                            <div class="col-md-8" style="text-align: center">
                                <input id="age_confirm" type="checkbox" class="form-control" name="age_confirmation" required>
                                <small>Si eres menor de edad y quieres participar, ponte en <a href="https://netconplay.com/contacto/" target="_blank">contacto con la organización</a> para verificar que tienes permiso parental</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="privacy_confirm" class="col-md-4 control-label">He leído y acepto la política de protección de datos</label>
                            <div class="col-md-8" style="text-align: center">
                                <input id="privacy_confirm" type="checkbox" class="form-control" name="privacy_confirmation" required>
                                <small><a href="https://netconplay.com/politica-de-privacidad-de-datos/" target="_blank">Leer la política de protección de datos</a></small>
                            </div>
                        </div>

                        <div class="form-group" style="text-align: center">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
