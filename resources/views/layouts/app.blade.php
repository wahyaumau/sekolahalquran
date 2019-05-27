<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sekolah Al-Qur'an Indonesia</title>
    <link rel="shortcut icon" href="{{asset('logo-sqi.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('css/material-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/master.css')}}">

    <!-- Other Style -->
    @yield('stylesheets')

</head>

<body class="body mx-3 my-3">
    <div class="postbody-shadow container-fluid bg-white p-0">
        <hr class="mx-0 my-0 px-0 py-0" style="height:4px;border:none;color:#958C4A;background-color:#958C4A;" />

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mx-auto ">
          <a class="navbar-brand text-center" href="{{url('/')}}">
              <img class="nav-img" src="{{asset('logo-ymbs.png')}}" height="55" alt="">
              <img class="nav-img" src="{{asset('logo-sqi.png')}}" height="55" alt="">
              <img class="ml-3" src="{{asset('logo-sqi-tulisan.png')}}" height="40" alt="">
          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link text-center" href="{{url('/')}}"> <h5>Beranda</h5> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                        <a class="nav-link text-center" href="{{url('/profile')}}"> <h5>Profil</h5> </a>
                    </li>
                    <li class="nav-item {{ Request::is('blogs*') ? 'active' : '' }}">
                        <a class="nav-link text-center" href="{{ route('blogs.index') }}"> <h5>Posting</h5> </a>
                    </li>
                    @auth
                    <li class="nav-item {{ Request::is('posts*') ? 'active' : '' }}">
                        <a class="nav-link text-center" href="{{route('posts.index')}}"> <h5>Post Management</h5> </a>
                    </li>
                    <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                        <a class="nav-link text-center" href="{{route('categories.index')}}"> <h5>Categories Management</h5> </a>
                    </li>
                    @endauth

                    @yield('panel')

                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-center text-white btn btn-success px-3 mx-3 " href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-center dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Content Goes Here -->
        <div class="container-fluid m-0 p-0  bg-light">
            @yield('content')
        </div>

        <footer class="bg-dark text-light p-5">
            <div class="row">
                <div class="col-md-4">
                    <ul class="navbar-nav">
                      <li>
                        <div class="row">
                          <div class="col-2">
                            <i class="fas fa-money-check-alt fa-2x"></i>
                          </div>
                          <div class="col-10">
                            <h4>Rekening Donasi</h4>
                            <p class="text-light">
                              Transfer BNI Syari’ah a/n Yayasan Mutiara Bangsa Sejahtera
                            </p>
                            <p>
                              No. Rekening <span class="text-warning">0768071445</span> (kode bank <span class="text-warning">427</span>)
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <hr>
                      </li>
                        <li>
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                </div>
                                <div class="col-10">
                                  <h4>Alamat Kantor Sekretariat</h4>
                                  <p>Jl. Margahayu Kencana V Blok D1 No. 18, Kel. Margahayu Selatan, Kec. Margahayu, Kab. Bandung,  Jawa Barat 40226.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                          <hr>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-phone fa-2x"></i>
                                </div>
                                <div class="col-10">
                                    <h4>Nomor Kontak</h4>
                                    <a class="text-white" href="tel:087828748400">0878-2874-8400 <small>(Ust. Abu)</small> </a><br>
                                    <a class="text-white" href="tel:089668117552">0896-6811-7552 <small>(Afifah)</small> </a>
                                </div>
                            </div>
                        </li>
                        <li>
                          <hr>
                        </li>
                        <!-- <li>
                            <div class="row my-4">
                                <div class="col-md-12">
                                    <a href="#!" class="btn btn-success btn-block">Info Selengkapnya</a>
                                </div>
                            </div>
                        </li> -->
                    </ul>

                </div>
                <div class="col-md-4">
                    <div class="my-2 align-middle">
                        <h4>Media Sosial</h4>
                        <a href="https://api.whatsapp.com/send?phone=6289668117552&text=Assalamualaikum%20SQI%20Saya%20Mau%20Bertanya" class="btn btn-outline-light my-1" target="_blank">
                          <span class="fab fa-whatsapp mr-2"></span>
                          Whatsapp
                        </a>
                        <a href="https://www.instagram.com/sekolahalquran_id" class="btn btn-outline-light my-1" target="_blank">
                          <span class="fab fa-instagram mr-2"></span>
                          Instagram
                        </a>
                        <a href="https://web.facebook.com/sekolahalquranid" class="btn btn-outline-light my-1" target="_blank">
                          <span class="fab fa-facebook mr-2"></span>
                          Facebook
                        </a>
                        <a href="https://www.youtube.com/channel/UCutqZNGpak55B2HHCYlsK1w" class="btn btn-outline-light my-1" target="_blank">
                          <span class="fab fa-youtube mr-2"></span>
                          YouTube
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="my-2">
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.405203524042!2d107.5633683188588!3d-6.967857244061096!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8d2b8d59b11%3A0x3636ae3b59e5b230!2sSekolah+al-Qur&#39;an+Indonesia!5e0!3m2!1sid!2sus!4v1557149943886!5m2!1sid!2sus" width="600" height="450" frameborder="0" style="border:0; height:20vw; min-height: 200px" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </footer>
        <div class="text-center p-1 shadow" style="background-color:#050505; font-size:10px;">
            <p class="text-light m-1">Copyright © 2019 SQI. All rights reserved. Hand-crafted by <a class="text-white" href="http://unisite.id"> <b>UNISITE.ID</b> </a> </p>
        </div>

    </div>
</body>

<!-- Script -->
<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/master.js')}}"></script>

<!-- Other Script -->
@yield('javascripts')

</html>
