<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'user_id' => 'integer',
      'game_id' => 'integer',
    ];

    /**
     * Author of the message
     */
    public function author() {
      return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Game of the message
     */
    public function game() {
      return $this->belongsTo(Game::class, 'game_id');
    }
}
