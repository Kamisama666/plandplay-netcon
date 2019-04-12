<?php

namespace App\Console\Commands;

use App\Game;
use App\User;
use App\Events\PlayerRegistered;
use App\Events\PlayerUnregistered;
use App\Events\WaitlistPlayerRegistered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UnregisterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'games:unregister {game_id} {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unregisters an user from a game';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $game_id = $this->argument('game_id');
        $user_id = $this->argument('user_id');

        $game = Game::find($game_id);
        $user = User::find($user_id);

        if (!$game || !$user) {
            $this->error(' The game or user is invalid');
        }

        if (!$game->isRegistered($user)) {
            $this->error('The user is not registered in the game');
        }

        $was_full = $game->isFull();

        DB::transaction(function () use ($game, $user, $was_full) {
            $game->players()->detach($user->id);
            if ($was_full && $game->waitlist()->count()) {
                $this->popWaitlist($game);
            } else {
                $game->signedup_players_number = $game->signedup_players_number - 1;
                $game->save();
            }
        });

        event(new PlayerUnregistered($game, $user));
    }

    private function popWaitlist(Game $game) {
        $waitlisted = $game->waitlist()->orderBy('game_waitlist.waitlisted_at', 'asc')->first();

        if (!$waitlisted) {
            return;
        }

        $game->waitlist()->detach($waitlisted->id);
        $game->players()->attach($waitlisted->id);

        event(new PlayerRegistered($waitlisted, $game));
        event(new WaitlistPlayerRegistered($waitlisted, $game));
    }
}
