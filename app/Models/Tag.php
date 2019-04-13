<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends SoftDelete
{	
    public function posts(){
    	return $this->belongsToMany('App\Models\Post');		
    }
    public function user(){
    	return $this->belongsTo('App\Models\User');	
    }
}
