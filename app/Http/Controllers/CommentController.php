<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5, max:5000',
        ));
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = false;
        $comment->post()->associate($post->id);
        $comment->save();        
        return redirect()->route('blogs.show', $post->slug)->with('success', 'comment berhasil ditambahkan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $post_id = $comment->post->id;
        $comment->delete();
        return redirect()->route('posts.show', $post_id)->with('success', 'comment berhasil dihapus');
    }

    public function reply(Request $request, Post $post, Comment $comment){        
        $this->validate($request, array(
            'nameReply' => 'required|max:255',
            'emailReply' => 'required|email|max:255',
            'commentReply' => 'required|min:5, max:5000',
        ));
        $reply = new Comment;
        $reply->name = $request->nameReply;
        $reply->email = $request->emailReply;
        $reply->comment = $request->commentReply;
        $reply->approved = false;
        $reply->post()->associate($post->id);
        $reply->comment()->associate($comment->id);        
        $reply->save();        
        return redirect()->route('blogs.show', $post->slug)->with('success', 'comment berhasil ditambahkan');
    }
}
