<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends SoftDelete
{
    public function post(){
    	return $this->belongsTo('App\Models\Post');
    }
}
