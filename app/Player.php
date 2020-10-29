<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function game(){
    	return $this->belongsTo(Game::class);
    }
}
