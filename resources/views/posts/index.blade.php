@extends('layouts.app')


@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Post</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('posts.create')}}"><button class="btn btn-success float-right">Create Post</button></a>
        </div>
    </div>
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

    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Tag</th>
                    <th>URL</th>
                    <th>Creator</th>
                    <th>Created Time</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listPost as $post)
                <tr>
                    <td>{{$loop->index}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{ str_limit((strip_tags($post->body)), $limit = 100, $end = '...') }}</td>
                    <td>{{$post->category->title}}</td>
                    <td>
                        @foreach($post->tags as $tag)
                        {{ $tag->name }}
                        @endforeach
                    </td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post)}}" class="btn btn-success">Show</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            <div class="text-center">
                {!!$listPost->links(); !!}
            </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
