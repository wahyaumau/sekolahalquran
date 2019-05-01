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
        $listCategory = Category::all();
        return view('blogs.show', compact('post', 'listCategory'));
    }

    public function index(){
    	$listPost = Post::latest()->paginate(5);
        $listCategory = Category::all();
        $message = "Display all blog";
    	return view('blogs.index', compact('listPost', 'listCategory', 'message'));
    }

    public function blogByCategory(Category $category){
    	$listPost = $category->posts()->latest()->paginate(5);
    	$listCategory = Category::all();
        $message = "Display ".$listPost->count()." blog by ".$category->title." category";
    	return view('blogs.index', compact('listPost', 'listCategory', 'message'));
    }

}
