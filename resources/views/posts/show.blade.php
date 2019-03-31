@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <img src="{{ asset('images/' . $post->image) }}">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <p>{!! $post->body !!}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->slug }}</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('posts.index') }}">Back To List Post</a>                    
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Comment</th>
                    <th>Commentator</th>
                    <th>Email</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post->comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->email}}</td>
                    <td>
                        <a href="{{ route('comments.edit', $comment)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('comments.destroy', $comment)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>
@endsection