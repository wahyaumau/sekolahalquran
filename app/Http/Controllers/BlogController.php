<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function show($slug)
    {        
    	$post = Post::whereSlug($slug)->first();
        return view('blogs.show', compact('post'));
    }

    public function index(){
    	$listPost = Post::latest()->paginate(20);
        $listCategory = Category::all();        
        $message = "Display all blog";
        $category=null;        
    	return view('blogs.index', compact('listPost', 'listCategory', 'message', 'category'));
    }

    public function blogByCategory(Category $category){
    	$listPost = $category->posts()->latest()->paginate(20);
    	$listCategory = Category::all();                
        $message = "Display ".$listPost->count()." blog by ".$category->title." category";
    	return view('blogs.index', compact('listPost', 'listCategory', 'message', 'category'));
    }
    
}
