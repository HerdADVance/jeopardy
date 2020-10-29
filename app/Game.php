<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function boards(){
    	return $this->hasMany(Board::class);
    }

    public function finalQuestion(){
    	return $this->hasOne(finalQuestion::class);
    }

    public function players(){
    	return $this->hasMany(Player::class);
    }
}
