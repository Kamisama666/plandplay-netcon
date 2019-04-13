
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
    protected $signature = 'games:notifyregistration {game_id} {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify of the registration of an user in a game';

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
    
        event(new PlayerRegistered($waitlisted, $game));
        event(new WaitlistPlayerRegistered($waitlisted, $game));
    }
}
