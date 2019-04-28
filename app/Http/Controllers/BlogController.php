<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

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
        $listTag = Tag::all();
        $message = "Display all blog";
        $category=null;
        $tag=null;
    	return view('blogs.index', compact('listPost', 'listCategory', 'listTag', 'message', 'category', 'tag'));
    }

    public function blogByCategory(Category $category){
    	$listPost = $category->post()->latest()->paginate(20);
    	$listCategory = Category::all();
        $listTag = Tag::all();
        $tag=null;
        $message = "Display ".$listPost->count()." blog by ".$category->title." category";
    	return view('blogs.index', compact('listPost', 'listCategory', 'listTag', 'message', 'category', 'tag'));
    }

    public function blogByTag(Tag $tag){
    	$listPost = $tag->posts()->latest()->paginate(20);
    	$listCategory = Category::all();
        $listTag = Tag::all();
        $category=null;
        $message = "Display ".$listPost->count()." blog by ".$tag->name." tag";
    	return view('blogs.index', compact('listPost', 'listCategory', 'listTag', 'message', 'tag', 'category'));
    }
}
