Hola {{$owner->name}}.

<p>Lamentamos decirte que uno de las jugadoras ha abandonado tu partida de <a href="{{route('game_view', ['game' => $game], true)}}">{{$game->title}}</a></p>

<p>No te preocupes, seguro que no tardaras nada de tiempo en contrar a alguien que la sustituya. Y si necesitas ayuda, no dudes en <a href="http://netcon.viruk.com/contacto/">ponerte en contacto con la organizacion</a>.</p>
<p>- Netconplay</p>