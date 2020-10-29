<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finalQuestion extends Model
{
    public function game(){
    	return $this->belongsTo(Game::class);
    }
}
