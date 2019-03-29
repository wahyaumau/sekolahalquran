<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends SoftDelete
{
    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');	
    }

    public function tags(){
    	return $this->belongsToMany('App\Models\Tag');		
    }

    public function comments(){
    	return $this->hasMany('App\Models\Comment');
    }
}
