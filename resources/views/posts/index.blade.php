@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Post</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('posts.create')}}"><button class="btn btn-primary">Create Post</button></a>
        </div>        
    </div>        

    <div class="box">    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Creator</th>                    
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listPost as $post)
                <tr>            
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>                    
                    <td>{{ str_limit($post->body, $limit = 100, $end = '...') }}</td>
                    <td>{{$post->category->title}}</td>                                        
                    <td>{{$post->user->name}}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post->id)}}" class="btn btn-success">Show</a>
                    </td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
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

