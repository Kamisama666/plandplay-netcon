<?php

namespace App\Http\Controllers;

use App\Game;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public function store(Game $game, Request $request) {
      $user = auth()->user();


      if (!$game->canCreateMessage($user)) {
        abort(403, 'No puedes crear mensajes en este juego');
      }

      $messages = [
            'required' => 'El campo :attribute es necesario.',
            'string' => 'El campo :attribute es necesario.',
            'max' => 'El campo :attribute no puede ser mas grande que :max caracteres.',
        ];

      $validationRules = [
            'content' => 'string|max:500|required',
        ];

      Validator::make($request->all(), $validationRules, $messages)->validate();

      $message = new Message();
      $message->content = $request->get('content');
      $message->user_id = $user->id;
      $message->game_id = $game->id;

      $message->save();

      return redirect()->route('game_view', ['game' => $game]);
    }
}
