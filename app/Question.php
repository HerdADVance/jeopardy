<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function category(){
    	return $this->belongsTo(Category::class);
    }
    
}
