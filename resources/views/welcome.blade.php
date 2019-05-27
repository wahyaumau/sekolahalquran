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
    <div class="item carousel-item {{ $loop->first ? 'active' : '' }}">
      <img class="img-carousel img-fit d-block w-100" src="{{asset('images/'.$post->image)}}" alt="{{ $post->title }}">
      <div class="carousel-caption ">
          <a class="text-white" href="{{route('blogs.show', $post->slug )}}"><h3>{{ $post->title }}</h3></a>
          <p class="d-none d-sm-block">{{ str_limit((strip_tags($post->body)), $limit = 200, $end = '...') }}</p>
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

<div class="container-fluid">

</div>

<div class="jumbotron jumbotron-fluid m-0 px-4 img-fit text-light justify-content-center" style="background-image: url('images/important/penerimaan.png');">
  <div class="col-md-8">
    <h1 class="display-4"> <b>Kamukah Sang Pejuang Qur'an?</b> </h1>
    <p class="lead">Rasulullah SAW bersabda :</p>
    <p><i>
      "Allah memiliki keluarga dari golongan manusia.
      Sahabat bertanya : siapa mereka ya Rasulallah?
      Rosul SAW menjawab : mereka adalah ahlul Quran.
      Mereka adalah hamba yg istimewa" </i> (H.R ibnu Majah).
    </p>
    <hr class="my-4">
    <p>
      YUK GABUNG! - <b>PENERIMAAN SANTRI BARU SEKOLAH AL-QUR'AN INDONESIA</b>.
      Mari bersama-sama wujudkan Peradaban Gemilang bersama kami!
      <br><br>
      <b>Program Unggulan :</b>
      <li>Dauroh 6 bulan hafal 30 Juz</li>
      <li>Dauroh 1 tahun hafal 30 Juz</li>
      <li>Tahfizh 30 Juz + S1</li>
      <li>Tahfizh 30 Juz + SMA</li>
      <li>Les Tahsin dan Tahfizh al-Qur'an</li>
    </p>
    <a class="btn btn-success btn-lg" href="{{ route('blogs.show', "penerimaan-santri-baru") }}" role="button">Info Selengkapnya</a>
  </div>
</div>
<div class="container-fluid p-0">
  <img class="w-100 d-none d-sm-block" src="{{asset('images/important/donasi-horizontal.png')}}" alt="">
  <img class="w-100 d-sm-none" src="{{asset('images/important/donasi-vertical.png')}}" alt="">
</div>
@endsection
