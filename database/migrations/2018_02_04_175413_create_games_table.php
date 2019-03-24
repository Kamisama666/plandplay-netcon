<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('games', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 150);
			$table->text('description');
			$table->string('game_system', 250);
			$table->string('platform', 250);
			$table->string('image_name', 300)->nullable();
			$table->dateTime('starting_time')->nullable();
			$table->integer('duration_hours')->unsigned()->nullable();
			$table->integer('sessions_number')->unsigned()->default(1);
			$table->integer('session_no')->unsigned()->default(1);
			$table->integer('maximum_players_number')->unsigned()->nullable();
			$table->integer('signedup_players_number')->unsigned()->default(0);
			$table->boolean('streamed')->default(false);
			$table->string('stream_channel', 250)->nullable();
			$table->boolean('beginner_friendly')->default(false);
			$table->boolean('approved')->default(false);
			$table->boolean('safety_tools')->default(false);
			$table->boolean('children_created')->default(false);
			$table->integer('owner_id')->unsigned();
			$table->integer('parent_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('owner_id')->references('id')->on('users');
			$table->foreign('parent_id')->references('id')->on('games');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('games');
	}
}
