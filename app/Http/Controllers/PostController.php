<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        return view('posts.create', compact('listCategory'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);        
        $listCategory = Category::all();
        return view('posts.edit', compact('post', 'id','listCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            // 'slug' => 'required|min:5|max:255|unique:posts,slug',
            'body' => 'required'                        
        ));

        $post = Post::find($id);        
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = $request->get('slug');        
        $post->category_id = $request->get('category_id');  
        $post->save();                    
        return redirect()->route('posts.index')->with('success', 'berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'berhasil dihapus');
    }
}
