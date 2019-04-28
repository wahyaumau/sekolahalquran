<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Sekolah Al-Qur'an Indonesia</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Style -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/master.css')}}">

        <!-- Other Style -->
        @yield('stylesheets')

    </head>
    <body class="body mx-3 my-3">
      <div class="postbody-shadow container-fluid bg-white p-0">
        <hr class="mx-0 my-0 px-0 py-0" style="height:4px;border:none;color:#958C4A;background-color:#958C4A;" />

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white mx-0">
          <a class="navbar-brand" href="{{url('/')}}">
            <img class="nav-img" src="{{asset('logo-ymbs.png')}}" height="50" alt="">
            <img class="nav-img" src="{{asset('logo-sqi.png')}}" height="50" alt="">
            <img class="ml-3" src="{{asset('logo-sqi-tulisan.png')}}" height="40" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link text-center" href="{{url('/')}}">Beranda<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ Request::is('profile') ? 'active' : '' }}">
                <a class="nav-link text-center" href="{{url('/profile')}}">Profil</a>
              </li>
              <li class="nav-item {{ Request::is('blogs*') ? 'active' : '' }}">
                <a class="nav-link text-center" href="{{ route('blogs.index') }}">Posting</a>                
              </li>
              @auth
              <li class="nav-item {{ Request::is('posts*') ? 'active' : '' }}">
                <a class="nav-link text-center" href="{{route('posts.index')}}">Post Management</a>
              </li>
              <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                <a class="nav-link text-center" href="{{route('categories.index')}}">Categories Management</a>
              </li>
              @endauth


              <!-- Panel Goes Here -->
              @yield('panel')

              @guest
                <li class="nav-item">
                  <a class="nav-link text-center text-white btn btn-success" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                </li>
                <!-- @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
                @endif -->
              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
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
        <div class="container-fluid m-0 p-0">
          @yield('content')
        </div>

        <footer class="bg-dark text-light p-5">
          <div class="row">
            <div class="col-md-4">
              <ul class="navbar-nav">
                <li>
                  <div class="row">
                    <div class="col-2">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="col-10">
                      <p>Nata Endah C 31, Jl. Raya Soreang Kopo, <br>Margahayu Tengah, Margahayu, <br>Bandung, Jawa Barat 40225.</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="row">
                    <div class="col-2">
                      <i class="fas fa-phone"></i>
                    </div>
                    <div class="col-10">
                      <a class="text-white" href="tel:082121302930">0821-2130-2930</a><br>
                      <a class="text-white" href="tel:089688118089">0896-8811-8089</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="row my-4">
                    <div class="col-md-12">
                      <button class="btn btn-success" href>Info Selengkapnya</button>
                    </div>
                  </div>
                </li>
              </ul>

            </div>
            <div class="col-md-4">
              <div class="my-2">
                <p>Media Sosial</p>
                <a href="#"><i class="mx-1 text-white fab fa-whatsapp fa-2x"></i></a>
                <a href="#"><i class="mx-1 text-white fab fa-instagram fa-2x"></i></a>
                <a href="#"><i class="mx-1 text-white fab fa-facebook fa-2x"></i></a>
                <a href="#"><i class="mx-1 text-white fab fa-youtube fa-2x"></i></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="my-2">
                <iframe class="w-100 h-100" src="https://maps.google.com/maps?q=Nata Endah 31, Jl. Raya Soreang Kopo, Margahayu Tengah, Margahayu,Bandung, Jawa Barat 40225.&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </footer>
        <div class="text-center p-1" style="background-color:#050505; font-size:10px;">
          <p class="text-light m-1">Copyright © 2019 SQI. All rights reserved. Hand-crafted by W.R.</p>
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
