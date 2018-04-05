<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function winner() {
      return $this->belongsTo(User::class, 'user_id');
    }
}
