@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5>Category <span class="badge badge-pill badge-secondary">{{ $listCategory->count() }}</span></h5>
			</div>
			<div class="list-group">
				@foreach($listCategory as $blogCategory)
				<a href="{{ route('blogs.category',$blogCategory) }}" class="list-group-item list-group-item-action {{ $blogCategory==$category? 'active':'' }}">
					{{ $blogCategory->title }}<span class="badge badge-pill badge-secondary">{{ $blogCategory->post->count() }}</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5>Tag <span class="badge badge-pill badge-secondary">{{ $listTag->count() }}</span></h5>
			</div>
			<div class="list-group">
				@foreach($listTag as $blogTag)
				<a href="{{ route('blogs.tag',$blogTag) }}" class="list-group-item list-group-item-action {{ $blogTag==$tag? 'active':'' }}">
					{{ $blogTag->name }}<span class="badge badge-pill badge-secondary">{{ $blogTag->posts->count() }}</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="alert alert-primary" role="alert">
  {{ $message }} @if($tag != null || $category != null)<a href="{{ route('blogs.index') }}" class="alert-link">Display all blogs</a>@endif
</div>

@foreach($listPost as $post)
<div class="col-md-10">
	<div class="card">
		<h5 class="card-header">{{ $post->title }}</h5>
		<div class="card-body">
			<p class="card-text">{!! $post->body !!}</p>
			<p>Category : </p>
			<span class="badge badge-secondary">{{ $post->category->title }}</span>
			<p>Tags : </p>
			@foreach($post->tags as $tag)
			<span class="badge badge-secondary">{{ $tag->name }}</span>
			@endforeach
			<a href="{{ route('blogs.show', $post->slug) }}" class="btn btn-primary">Read More</a>
		</div>
	</div>
</div>
@endforeach
{!!$listPost->links(); !!}
@endsection