<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function games(){
        return $this->belongsToMany(Game::class)->withPivot('quantity')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
