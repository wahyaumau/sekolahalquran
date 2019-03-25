<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends SoftDelete
{
    public function post(){
    	return $this->hasMany('App\Models\Post');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');	
    }
}
