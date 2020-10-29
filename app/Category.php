<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function board(){
    	return $this->belongsTo(Board::class);
    }

    public function questions(){
    	return $this->hasMany(Question::class);
    }
}
