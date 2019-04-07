@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/game_show.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if ($user)
                        <a href="{{route('home')}}">Volver a mi perfil</a> |
                    @else
                        <a href="/login">Login</a> |
                    @endif

                    <a href="http://netconplay.com/contacto" target="_blank">Contacto</a>
                </div>

                <div id="game_view" class="panel-body" >

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{$game->title}} {{ $is_full ? '(Completo)' : null }}</h3>

                    <div style="text-align: center;">
                        @if ($game->isPartial())
                            <small>Esta sesión es parte de una partida de multiples sesiones. Puedes encontrar <a href="{{route('game_view', ['game' => $game->parent])}}">la primera sesion aquí</a></small>
                        @endif
                    </div>


                    <p style="padding: 15px; ">
                    @if ($game->image_name)
                        <img
                                class="image_game"
                                src="{{route('storage_get', $game->image_name)}}"
                                alt="{{$game->title}}"

                            >
                    @else
                        <img
                                class="image_game"
                                src="{{ asset('img/sin_imagen.png') }}"
                                alt="{{$game->title}}"

                            >
                    @endif
                    </p>

                    <div class="col-md-8 col-md-offset-2">
                        <p><strong>Organizador/a</strong>: <a href="{{route('game_list') . '?owner_id=' . $game->owner_id}}">{{$game->owner->name}}</a></p>
                        @if ($is_owner)
                            <p><strong>Status</strong>: {{$game->approved ? 'Aprobada' : 'Pendiente de aprobar'}}</p>
                        @endif
                        <p style="word-break: normal;">{!! nl2br(e($game->description)) !!}</p>

                        <p><strong>Sistema de Juego</strong>: {{$game->game_system}}</p>

                        <p><strong>Plataforma de Juego</strong>: {{$game->platform}}</p>

                        <p><strong>Hora de Inicio</strong>:
                            {{
                                $game->starting_time ?
                                $user_timezone ?
                                (new Date($game->starting_time->setTimezone($user_timezone)->toDateTimeString()))->format('l j F Y H:i') :
                                (new Date($game->starting_time->toDateTimeString()))->format('l j F Y H:i')
                                : null
                            }}
                        </p>

                        <p><strong>Número de Horas de Duración</strong>: {{$game->duration_hours}}</p>

                        <p><strong>Número de Sesiones</strong>: {{$game->sessions_number}}</p>

                        <p><strong>Emitida</strong>: {{$game->streamed ? 'Si' : 'No'}}</p>

                        <p><strong>Partida de Iniciación</strong>: {{$game->beginner_friendly ? 'Si' : 'No'}}</p>

                        <p><strong>Usa Herramientas de Seguridad</strong>: {{$game->safety_tools ? 'Si' : 'No'}}</p>

                        <p><strong>Aviso de Contenido Sensible</strong>: {{$game->content_warning}}</p>

                        @if ($game->stream_channel)
                        <p><strong>Canal de Emisión</strong>: {{$game->stream_channel}}</p>
                        @endif

                        <p><strong>Número Máximo de Jugadoras</strong>: {{$game->maximum_players_number}}</p>

                        <p>
                            <strong>Número de Jugadoras Registradas</strong>: {{$game->signedup_players_number}}
                        </p>

                        @if ($is_full)
                            <h3 class="text-center text-info">
                                <strong>
                                El juego está lleno
                                </strong>
                            </h3>
                        @endif

                        @if ($user && $registration_open)

                            @if ($game->canRegister($user))
                                <a href="{{route('game_register', ['game' => $game])}}" type="button" class="btn btn-primary center-block" role="button">Registrarse</a>
                            @elseif ($game->canWaitlist($user))
                                <a href="{{route('game_register_waitlist', ['game' => $game])}}" type="button" class="btn btn-warning center-block" role="button">Apuntarse a la Lista de Espera</a>
                            @endif

                            @if (!$game->isOwner($user) && $game->isPartial())
                                <h3 class="text-center text-info">
                                    Esta es una partida de multiples sesiones. Para registrarte, debes hacerlo en <a href="{{route('game_view', ['game' => $game->parent])}}">la primera sesión</a>.
                                </h3>
                            @endif

                            @if ($is_registered)
                                <h3 class="text-center">
                                    <strong>
                                    ¡Estas registrad@!
                                    </strong>
                                </h3>

                                <a href="{{route('game_unregister', ['game' => $game])}}" type="button" class="btn btn-danger center-block" role="button">Abandorar Partida (¡CUIDADO!)</a>
                            @endif

                            @if ($is_waitlisted)
                                <h3 class="text-center">
                                    <strong>
                                    ¡Estas en la lista de espera!
                                    </strong>
                                </h3>

                                <p>Si queda un espacio libre y estas la primera en la lista de espera, te registraremos en la partida automáticamente y te enviaremos un correo para avisarte.</p>

                                <a href="{{route('game_unregister_waitlist', ['game' => $game])}}" type="button" class="btn btn-danger center-block" role="button">Abandorar Lista de Espera (¡CUIDADO!)</a>
                            @endif
                        @endif
                    </div>
                </div>

                @if ($is_owner && $game->players()->count())
                <div class="panel-body">
                    <h3>Jugadoras Registradas</h3>

                    <ul>
                        @foreach ($game->players as $player)
                            <li>{{$player->name}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ($is_owner && $game->waitlist()->count())
                <div class="panel-body">
                    <h3>Jugadoras en Lista de Espera</h3>

                    <ul>
                        @foreach ($game->waitlist as $player)
                            <li>{{$player->name}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (!$game->isPartial() && $game->canReadMessages($user))
                <div class="panel-body">
                    <h3>Mensajes</h3>

                    <p>Solo los participantes en la partida podran ver este chat. Puedes usarlo para organizar la partida. Es un sistema muy limitado, por lo que recomendamos usar otros servicios como Hangouts o Discord para comunicarse mas extensamente</p>

                    @if ($game->messages()->count())
                        @foreach($game->messages()->with('game')->get() as $message)
                            <blockquote class="blockquote">
                                <p class="mb-0 small">{{$message->content}}</p>

                                @if ($message->author->id === $game->owner->id)
                                    <footer class="blockquote-footer"><b>{{$message->author->name}}</b></footer>
                                @else
                                    <footer class="blockquote-footer">{{$message->author->name}}</footer>
                                @endif
                            </blockquote>
                        @endforeach
                    @endif

                    <br />

                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    {!! Form::open(['url' => route('message_create', ['game' => $game])]) !!}
                        <div class="form-group">
                            {!! Form::text('content', '', ['class' => 'form-control','placeholder'=>'Escribe hasta 500 caracteres']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Enviar mensage', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
