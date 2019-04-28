@extends('layouts.app')
@section('content')
<div class="container-fluid m-0 p-4">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Category</h3>
        </div>
        <div class="col-md-4">
            <a href="{{route('categories.create')}}"><button class="btn btn-primary">Create Category</button></a>
        </div>
    </div>
    <div class="box">
        <table class="table table-responsive-lg table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Creator</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCategory as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->user->name}}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category)}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <div class="text-center">
                    {!!$listCategory->links(); !!}
                </div>
            </tbody>
        </table>
    </div>
</div>
@endsection
