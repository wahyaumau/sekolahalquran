<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;
use Purifier;
use Image;
use Storage;

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
        $listPost = Post::paginate(20);        
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
            'body' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',
            
        ));
        $user_id = Auth::guard('web')->user()->id;        
        $post = new Post;        
        $post->title = $request->title;
        $post->body = clean($request->body);
        $post->slug = $request->slug;        
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time().'_'.$request->slug.'_'.$image->getClientOriginalName();
            $folderName = 'images';
            Storage::putFileAs($folderName, $image, $filename);            
            $post->image = $filename;            
        }
        $post->category_id = $request->category_id;        
        $post->user_id = $user_id;  
        $post->save();      
        $post->tags()->sync($request->tags, false);
        
        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat');
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
        
        if ($post->slug == $request->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',                
                'body' => 'required',
                'image' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',
            ));
        }else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|min:5|max:255|unique:posts,slug',
                'body' => 'required',
                'image' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif,image/svg',
            ));
        }

        $post->title = $request->title;
        $post->body = clean($request->body);
        $post->slug = $request->slug;        
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time().'-'.$image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldFile = $post->image;
            Storage::disk('public-images')->delete($oldFile);
            $post->image = $filename;            
        }
        $post->category_id = $request->category_id;  
        $post->save();    
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);                
        }else{
            $post->tags()->sync(array());                
        }
        
        return redirect()->route('posts.index')->with('success', 'Post berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {        
        Storage::disk('public-images')->delete($post->image);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus');
    }
}
