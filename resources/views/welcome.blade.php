@extends('layouts.app')

@section('content')
<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-carousel img-fit d-block w-100" src="{{asset('images/slider/1.jpeg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="img-carousel img-fit d-block w-100" src="{{asset('images/slider/2.jpeg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="img-carousel img-fit d-block w-100" src="{{asset('images/slider/3.jpeg')}}" alt="Third slide">
    </div>
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
<!-- Carousel -->

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
