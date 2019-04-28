@extends('layouts.app')
@section('content')
<div class="container-fluid m-0 p-4">
    @if (\Session::has('success'))
    <div class="row">
        <div class="alert alert-success col-md-12">
            <p>{{ \Session::get('success') }}</p>
        </div>
    </div>
    @elseif (\Session::has('fail'))
    <div class="row">
        <div class="alert alert-danger col-md-12">
            <p>{{ \Session::get('fail') }}</p>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p class="lead">{!! $post->body !!}</p>
            <hr>

            <div class="tags">
                <span>Category : </span>
                @foreach ($post->categories as $category)
                <span class="label label-default">{{ $category->name }}</span>
                @endforeach
            </div>
            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
                <table class="table table-responsive-lg">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th width="70px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
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
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p><a href="{{ route('blogs.show', $post->slug) }}">{{ $post->slug }}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    @foreach($post->categories as $category)
                    <p>{{ $category->name }}</p>
                    @endforeach
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('posts.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('posts.index') }}">Kembali ke list post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
