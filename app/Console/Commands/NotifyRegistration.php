<?php

namespace App\Console\Commands;

use App\Events\PlayerRegistered;
use App\Events\WaitlistPlayerRegistered;
use App\Game;
use App\User;
use Illuminate\Console\Command;

class NotifyRegistration extends Command {
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
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$game_id = $this->argument('game_id');
		$user_id = $this->argument('user_id');

		$game = Game::find($game_id);
		$user = User::find($user_id);

		if (!$game || !$user) {
			$this->error(' The game or user is invalid');
		}

		event(new PlayerRegistered($user, $game));
		event(new WaitlistPlayerRegistered($user, $game));
	}
}
