<p>¡Hola {{$player->name}}!</p>

<p>Tenemos muy buenas noticias. Estabas en la lista de espera del juego <a href="{{route('game_view', ['game' => $game], true)}}">{{$game->title}}</a> en las Netcon. Pero ha quedado un sitio libre y se te ha registrado automáticamente en la partida. ¡Eso significa que podrás jugar en ella!</p>

<p>Te recomendamos que vayas a la página de la partida y dejes un mensaje confirmando que asistirás. Y si no es así, por favor asegúrate de <b>abandonar la partida</b> (Pulsando el boton rojo de "Abandonar Partida" al final de la página) para que otra personaje pueda participar.</p>

<p>Puedes ver la partida <a href="{{route('game_view', ['game' => $game], true)}}">aquí</a></p>

<p>¡Disfruta!</p>

<p>- Netconplay</p>