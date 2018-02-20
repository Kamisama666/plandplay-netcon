<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->string('description', 500);
            $table->string('image_name', 300)->nullable();
            $table->dateTime('starting_time')->nullable();
            $table->integer('duration_hours')->unsigned()->nullable();
            $table->integer('sessions_number')->unsigned()->default(1);
            $table->integer('maximum_players_number')->unsigned()->nullable();
            $table->integer('signedup_players_number')->unsigned()->default(0);
            $table->string('time_preference', 250)->nullable();
            $table->boolean('streamed')->default(false);
            $table->string('stream_channel', 250)->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('open_signups')->default(false);
            $table->integer('owner_id')->unsigned();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
