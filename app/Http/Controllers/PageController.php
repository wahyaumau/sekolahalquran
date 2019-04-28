<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PageController extends Controller
{
    public function index(){
    	$listPost = Post::latest()->take(3)->get();
    	return view('welcome', compact('listPost'));
    }

    public function profile(){
    	return view('profile');
    }    
}
