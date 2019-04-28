@extends('layouts.app')

@section('content')
<!-- Carousel -->

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($listPost as $post)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($listPost as $post)
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
      <img class="img-carousel img-fit d-block w-100" src="{{asset('images/'.$post->image)}}" alt="{{ $post->title }}">
      <div class="carousel-caption d-none d-md-block">
          <h5>{{ $post->title }}</h5>
          <p>{{ str_limit((strip_tags($post->body)), $limit = 100, $end = '...') }}</p>
        </div>
    </div>    
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="jumbotron jumbotron-fluid m-0 px-4 img-fit text-light" style="background-image: url('images/slider/penerimaan.jpg');">
  <div class="mx-4">
    <h1 class="display-4">Penerimaan Santri Baru SQI</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </div>
</div>
@endsection
