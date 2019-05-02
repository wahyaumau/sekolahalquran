<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends SoftDelete
{
	use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $softCascade = ['comments'];
    public function post(){
    	return $this->belongsTo('App\Models\Post');
    }

    public function comments(){
    	return $this->hasMany('App\Models\Comment');
    }

    public function comment(){
    	return $this->belongsTo('App\Models\Comment');
    }
}
