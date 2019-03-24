<?php

namespace App\Http\Controllers;

use App\Game;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MultipleSessionsController extends Controller {
	use ValidatesRequests;

	public function create(Game $game) {
		$user = auth()->user();

		if ($game->owner_id !== $user->id) {
			abort(403, 'No tienes permiso para editar este juego');
		}

		if ($game->sessions_number < 2 || $game->children_created) {
			abort(401, 'La partida no es valida');
		}

		return view('multipleSessions.form', ['game' => $game]);
	}

	public function store(Request $request, Game $game) {
		$user = auth()->user();

		if ($game->owner_id !== $user->id) {
			abort(403, 'No tienes permiso para editar este juego');
		}

		if ($game->sessions_number < 2 || $game->children_created || $game->session_no > 1) {
			abort(401, 'La partida no es valida');
		}

		$messages = [
			'required' => 'El campo :attribute es necesario.',
			'string' => 'El campo :attribute es necesario.',
			'max' => 'El campo :attribute no puede ser mas grande que :max caracteres.',
		];

		$validationRules = [];

		for ($i = 2; $i <= $game->sessions_number; $i++) {
			$validationRules['starting_time_' . $i] = 'string|max:250|date_format:d/m/Y H:i|required';
		}

		Validator::make($request->all(), $validationRules, $messages)->validate();

		for ($i = 2; $i <= $game->sessions_number; $i++) {
			$childrenGame = new Game();

			$childrenGame->title = $game->title;
			$childrenGame->description = $game->description;
			$childrenGame->game_system = $game->game_system;
			$childrenGame->platform = $game->platform;
			$childrenGame->starting_time = Carbon::createFromFormat('d/m/Y H:i', $request->get('starting_time_' . $i), $user->timezone);
			$childrenGame->duration_hours = $game->duration_hours;
			$childrenGame->sessions_number = 4;
			$childrenGame->maximum_players_number = $game->maximum_players_number;
			$childrenGame->stream_channel = $game->stream_channel;
			$childrenGame->streamed = $game->streamed;
			$childrenGame->beginner_friendly = $game->beginner_friendly;
			$childrenGame->safety_tools = $game->safety_tools;
			$childrenGame->owner_id = auth()->user()->id;
			$childrenGame->image_name = $game->image_name;

			$childrenGame->parent_id = $game->id;
			$childrenGame->session_no = $i;

			$childrenGame->save();
		}

		$game->children_created = true;

		return redirect()->route('game_success');
	}
}
