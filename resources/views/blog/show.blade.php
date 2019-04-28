@extends('layouts.app')
@section('content')
<div class="container-fluid m-0 p-5">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          oleh
          <a href="">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Dibuat pada {{ date('F dS, Y - g:iA' ,strtotime($post->created_at)) }}</p>
        <p>Kategori :
            @foreach($post->tags as $tag)
            <span class="badge badge-secondary">{{ $tag->name }}</span>
            @endforeach
        </p>

        <hr>

        <!-- Preview Image -->
        @if(!empty($post->image))
          <img class="w-100" src="{{asset('/images/' . $post->image)}}" />
          <hr>
        @endif

        <!-- Post Content -->
        <p>{!! $post->body !!}</p>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="POST" action="{{ route('comments.store', $post) }}">
              @csrf
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama') }}</label>
                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                      @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
                  <div class="col-md-8">
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="comment" class="col-md-4 col-form-label text-md-left">{{ __('Comment') }}</label>
                  <div class="col-md-8">
                      <textarea id="comment" cols="10" rows="3" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}" autofocus></textarea>
                      @if ($errors->has('comment'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('comment') }}</strong>
                      </span>
                      @endif
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">
              {{ __('Submit') }}
              </button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        @foreach($post->comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle author-image" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" alt="">
          <div class="media-body">
            <div class="author-name">
                <h4 class="mb-0">{{ $comment->name }}</h4>
                <small class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</small>
            </div>
            <div class="comment-content mt-2 ml-2">
                {{ $comment->comment }}
            </div>
          </div>
        </div>
        @endforeach

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection
