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
}
