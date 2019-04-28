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
    	return view('blogs.index', compact('listPost', 'listCategory', 'listTag'));
    }

    public function blogByCategory(Category $category){
    	$listPost = $category->post()->latest()->paginate(20);
    	$listCategory = Category::all();
        $listTag = Tag::all();
    	return view('blogs.index', compact('listPost', 'listCategory', 'listTag'));
    }

    public function blogByTag(Tag $tag){
    	$listPost = $tag->posts()->latest()->paginate(20);
    	$listCategory = Category::all();
        $listTag = Tag::all();
    	return view('blogs.index', compact('listPost', 'listCategory', 'listTag'));
    }
}
