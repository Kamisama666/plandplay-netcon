<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function games() {
        return $this->hasMany(Game::class, 'owner_id');
    }

    public function signupGames() {
        return $this->belongsToMany(Game::class, 'game_player', 'player_id', 'game_id');
    }

    public function waitlistGames() {
        return $this->belongsToMany(Game::class, 'game_waitlist', 'waitlist_id', 'game_id');
    }
}
