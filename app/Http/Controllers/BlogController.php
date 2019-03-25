<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('blog.show', compact('post'));
    }
}
