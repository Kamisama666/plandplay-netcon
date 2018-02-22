<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class GamesController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'El campo :attribute es necesario.',
            'string' => 'El campo :attribute es necesario.',
            'max' => 'El campo :attribute no puede ser mas grande que :max caracteres.',
            'min' => 'El campo :attribute no puede ser menor que :min',
        ];

        $validationRules = [
            'title' => 'string|max:150|required',
            'description' => 'string|max:500|required',
            'game_system' => 'string|max:250|required',
            'platform' => 'string|max:250|required',
            'time_preference' => 'string|max:250|required',
            'duration_hours' => 'integer|min:1|required',
            'sessions_number' => 'integer|min:1|required',
            'maximum_players_number' => 'integer|min:1|required',
            'stream_channel' => 'string:250|nullable',
        ];

        Validator::make($request->all(), $validationRules, $messages)->validate();

        if($request->hasFile('game_image') && $request->file('game_image')->isValid()) {
            $file_name = 'game_image' . uniqid() . '.' . $request->game_image->extension();
            $image_path = $request->game_image->storeAs('public/images', $file_name);
        }

        $game = new Game();

        $game->title = $request->get('title');
        $game->description = $request->get('description');
        $game->game_system = $request->get('game_system');
        $game->platform = $request->get('platform');
        $game->time_preference = $request->get('time_preference');
        $game->duration_hours = $request->get('duration_hours');
        $game->sessions_number = $request->get('sessions_number');
        $game->maximum_players_number = $request->get('maximum_players_number');
        $game->stream_channel = $request->get('stream_channel');
        $game->streamed = $request->has('streamed') && $request->get('streamed') === 'streamed' ? true : false;
        $game->owner_id = auth()->user()->id;

        if (isset($image_path)) {
            $game->image_name = $file_name;
        }

        $game->save();

        return redirect()->route('game_success');
    }

    public function success() {
        return view('games.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $user = auth()->user();
        if (!$game->canView($user)) {
            abort(403, 'Invalid User');
        }

        $isOwner = $game->owner_id === $user->id;

        return view('games.show', [
            'game'=> $game, 
            'user' => $user,
            'isOwner' => $isOwner,
        ]);
    }

    public function showImage($filename) {
        $path = 'public/images/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        $rootPath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

        return response()->file($rootPath . $path);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
