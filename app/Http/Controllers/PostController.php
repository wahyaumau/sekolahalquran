<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;

class PostController extends Controller
{
    public function __construct()
    {        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = Post::paginate(10);        
        return view('posts.index', compact('listPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = Category::all();
        $listTag = Tag::all();
        return view('posts.create', compact('listCategory', 'listTag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|min:5|max:255|unique:posts,slug',
            'body' => 'required'                        
        ));
        $user_id = Auth::guard('web')->user()->id;        
        $post = new Post;        
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = $request->get('slug');        
        $post->category_id = $request->get('category_id');        
        $post->user_id = $user_id;  
        $post->save();      

        $post->tags()->sync($request->tags, false);
        return redirect()->route('posts.index')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {        
        $listCategory = Category::all();
        $listTag = Tag::all();
        return view('posts.edit', compact('post', 'listCategory', 'listTag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {                
        if ($post->slug == $request->get('slug')) {
            $this->validate($request, array(
                'title' => 'required|max:255',                
                'body' => 'required'                        
            ));
        }else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|min:5|max:255|unique:posts,slug',
                'body' => 'required'                        
            ));
        }        
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = $request->get('slug');        
        $post->category_id = $request->get('category_id');  
        $post->save();    
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);                
        }else{
            $post->tags()->sync(array());                
        }
        
        return redirect()->route('posts.index')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {        
        $post->delete();
        $post->tags()->detach();
        return redirect()->route('posts.index')->with('success', 'berhasil dihapus');
    }
}
