<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
