<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'starting_time'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'duration_hours' => 'integer',
      'sessions_number' => 'integer',
      'maximum_players_number' => 'integer',
      'signedup_players_number' => 'integer',
      'streamed' => 'boolean',
      'approved' => 'boolean',
      'open_signups' => 'boolean',
    ];

    /**
     * Owner of the game
     */
    public function owner() {
      return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Players registered to play in the game
     */
    public function players() {
      return $this->belongsToMany(User::class, 'player_id', 'game_id', 'id');
    }

    public function canView(User $user) {
      if ($this->owner_id === $user->id) {
        return true;
      }

      return false;
    }
}
