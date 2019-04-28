<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends SoftDelete
{
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $softCascade = ['comments'];
    public function categories(){
    	return $this->belongsToMany('App\Models\Category');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');	
    }    

    public function comments(){
    	return $this->hasMany('App\Models\Comment');
    }
}
