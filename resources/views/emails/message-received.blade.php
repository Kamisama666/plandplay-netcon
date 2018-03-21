¡Hola {{$user->name}}!

<p>Has recibido un mensaje en una de las partidas en la que participas en las Netcon: <b>{{$game->title}}</b></p>

<p>Puedes verlo <a href="{{route('game_view', ['game' => $game], true)}}">aquí</a></p>

<p>- Netconplay</p>