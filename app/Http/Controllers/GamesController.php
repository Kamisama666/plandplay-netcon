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
        return view('game_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|max:150|required',
            'description' => 'string|max:500|required',
            'time_preference' => 'string|max:250|required',
            'duration_hours' => 'integer|min:1|required',
            'sessions_number' => 'integer|min:1|required',
            'maximum_players_number' => 'integer|min:1|required',
            'stream_channel' => 'string:250|nullable',
        ]);

        if($request->hasFile('game_image') && $request->file('game_image')->isValid()) {
            $file_name = 'game_image' . uniqid() . '.' . $request->game_image->extension();
            $image_path = $request->game_image->storeAs('public/images', $file_name);
        }

        $game = new Game();

        $game->title = $request->get('title');
        $game->description = $request->get('description');
        $game->time_preference = $request->get('time_preference');
        $game->duration_hours = $request->get('duration_hours');
        $game->sessions_number = $request->get('sessions_number');
        $game->maximum_players_number = $request->get('maximum_players_number');
        $game->stream_channel = $request->get('stream_channel');
        $game->streamed = $request->has('streamed') && $request->get('streamed') === 'streamed' ? true : false;
        $game->owner_id = auth()->user()->id;

        if ($image_path) {
            $game->image_name = $file_name;
        }

        $game->save();

        return redirect()->route('game_success');
    }

    public function success() {
        return view('game_registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
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
