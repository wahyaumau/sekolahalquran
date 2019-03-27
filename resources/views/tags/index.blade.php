@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Tag</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('tags.create')}}"><button class="btn btn-primary">Create Tag</button></a>
        </div>
    </div>
    <div class="box">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Creator</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listTag as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->user->name}}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-primary">Edit</a>
                    </td>                    
                    <td>
                        <form action="{{ route('tags.destroy', $tag->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <div class="text-center">
                    {!!$listTag->links(); !!}
                </div>
            </tbody>
        </table>
    </div>
</div>
@endsection