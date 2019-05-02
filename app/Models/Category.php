<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends SoftDelete
{
	use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
	protected $softCascade = ['posts'];
	
    public function posts(){
    	return $this->belongsToMany('App\Models\Post');		
    }
    public function user(){
    	return $this->belongsTo('App\Models\User');	
    }
}
