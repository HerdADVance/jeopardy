<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function game(){
    	return $this->belongsTo(Game::class);
    }

    public function categories(){
    	return $this->hasMany(Category::class);
    }
}
