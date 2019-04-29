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
				<a href="{{ route('blogs.category',$blogCategory) }}" class="list-group-item list-group-item-action {{ Request::is('blogs/category/'.$blogCategory->id) ? 'active disabled' : '' }}">
					{{ $blogCategory->name }}<span class="badge badge-pill badge-secondary">{{ $blogCategory->posts->count() }}</span>
				</a>
				@endforeach
			</div>
		</div>
	</div>	
</div>

<div class="alert alert-primary" role="alert">
  {{ $message }} 
  @if(Request::is('blogs/category*'))
  <a href="{{ route('blogs.index') }}" class="alert-link">Display all blogs</a>
  @endif
</div>

@foreach($listPost as $post)
<div class="col-md-10">
	<div class="card">
		<h5 class="card-header">{{ $post->title }}</h5>
		<div class="card-body">
			<p class="card-text">{!! $post->body !!}</p>			
			<p>Category : </p>
			@foreach($post->categories as $category)
			<span class="badge badge-secondary">{{ $category->name }}</span>
			@endforeach
			<a href="{{ route('blogs.show', $post->slug) }}" class="btn btn-primary">Read More</a>
		</div>
	</div>
</div>
@endforeach
{!!$listPost->links(); !!}
@endsection