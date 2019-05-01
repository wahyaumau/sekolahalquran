@extends('layouts.app')
@section('content')
<div class="container-fluid m-0 p-5">
  <div class="row">
    <!-- Post Content Column -->
    <div class="col-lg-8">
      @if($listPost->count()==0)
      <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <strong>Tidak ada posting ditemukan !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
			@foreach($listPost as $post)
        <div class="card shadow-sm">
          <div class="card-body">
            <div class="row no-gutters position-relative">
              <div class="col-md-6 mb-md-0 p-md-4">
                <img src="{{asset('/images/' . $post->image)}}" class="w-100 img-fit" style="max-height: 200px" alt="{{ $post->slug }}">
              </div>
              <div class="col-md-6 position-static p-4 pl-md-0">
                <h5 class="mt-0">{{ $post->title }}</h5>
                <p class="text-justify">{{ str_limit((strip_tags($post->body)), $limit = 100, $end = '...') }}</p>
                <p>Category :
                @foreach($post->categories as $category)
    						<span class="badge badge-secondary">{{ $category->name }}</span><br>
    						@endforeach
                </p>
                <a href="{{ route('blogs.show', $post->slug) }}" class="stretched-link">Baca Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
			@endforeach
			<div class="mt-4">
				{!!$listPost->links(); !!}
			</div>
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Category Widget -->
			<div class="card">
				<div class="card-header">
					<b>Category</b><span class="ml-2 badge badge-pill badge-secondary">{{ $listCategory->count() }}</span>
				</div>
				<div class="card-body">
          <div class="list-group">
  					@if(Request::is('blogs/category*'))
  				  <a href="{{ route('blogs.index') }}" class="list-group-item list-group-item-action">Display all blogs</a>
  				  @endif
  					@foreach($listCategory as $blogCategory)
  					<a href="{{ route('blogs.category',$blogCategory) }}" class="list-group-item list-group-item-action {{ Request::is('blogs/category/'.$blogCategory->id) ? 'active disabled' : '' }}">
  						{{ $blogCategory->name }}<span class="ml-2 badge badge-pill badge-secondary">{{ $blogCategory->posts->count() }}</span>
  					</a>
  					@endforeach
  				</div>
        </div>
			</div>
    </div>

  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

<!-- <div class="alert alert-primary" role="alert">
  {{ $message }}
  @if(Request::is('blogs/category*'))
  <a href="{{ route('blogs.index') }}" class="alert-link">Display all blogs</a>
  @endif
</div> -->


@endsection
