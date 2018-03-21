<p>¡Hola {{$player->name}}!</p>

<p>Tenemos muy buenas noticias. Estabas en la lista de espera del juego <a href="{{route('game_view', ['game' => $game], true)}}">{{$game->title}}</a> en las Netcon. Pero ha quedado un sitio libre y se te ha registrado automaticamente en la partida. ¡Eso significa que podras jugar en ella!</p>

<p>Te recomendamos que vayas a la pagina de la partida y dejes un mensaje confirmando que asistiras. Y si no es asi, por favor asegurate de <b>abandonar la partida</b> (Pulsando el boton rojo de "Abandonar Partida" al final de la pagina) para que otra personaje pueda participar.</p>

<p>Puedes ver la partida <a href="{{route('game_view', ['game' => $game], true)}}">aquí</a></p>

<p>¡Disfruta!</p>

<p>- Netconplay</p>