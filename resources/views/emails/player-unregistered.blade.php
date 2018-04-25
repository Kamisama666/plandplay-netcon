Hola {{$owner->name}}.

<p>Lamentamos decirte que una de las jugadoras ha abandonado tu partida de <a href="{{route('game_view', ['game' => $game], true)}}">{{$game->title}}</a></p>

<p>No te preocupes, seguro que no tardarás nada de tiempo en encontrar a alguien que la sustituya. Y si necesitas ayuda, no dudes en <a href="http://netcon.viruk.com/contacto/">ponerte en contacto con la organización</a>.</p>
<p>- Netconplay</p>