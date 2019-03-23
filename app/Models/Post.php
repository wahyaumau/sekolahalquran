<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');	
    }
}
