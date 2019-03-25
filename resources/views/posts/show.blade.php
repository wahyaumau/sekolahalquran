@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <p>{{ $post->body }}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                <div class="card-body">
                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->slug }}</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('posts.index') }}">Back To List Post</a>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection