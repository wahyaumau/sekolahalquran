@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5>Category <span class="badge badge-pill badge-secondary">{{ $listCategory->count() }}</span></h5>
			</div>
			
			<ul class="list-group list-group-flush">
				@foreach($listCategory as $category)
				<li class="list-group-item"><a href="{{ route('blogs.category', $category) }}">{{ $category->title }}</a><span class="badge badge-pill badge-secondary">{{ $category->post->count() }}</span></li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h5>Tag <span class="badge badge-pill badge-secondary">{{ $listTag->count() }}</span></h5>
			</div>
			
			<ul class="list-group list-group-flush">
				@foreach($listTag as $tag)
				<li class="list-group-item"><a href="{{ route('blogs.tag', $tag) }}">{{ $tag->name }}</a><span class="badge badge-pill badge-secondary">{{ $tag->posts->count() }}</span></li>
				@endforeach
			</ul>
		</div>
	</div>
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