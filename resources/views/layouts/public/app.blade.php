<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/public.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/96ed7d3134.js"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Overpass:400,700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <div class="row topBar align-items-center sticky-top shadow">
      <div class="container">
        <div class="d-flex justify-content-between p-2">
          <div class="topBarPhone">
            <i class="fas fa-phone"></i>
            Kontakt Telefoni:&nbsp;&nbsp;
            <span> +381(11)2406-314 &nbsp; +381(11)2420-304 &nbsp;
            +381(63) 289-599 &nbsp; +381(63)239-697</span>
          </div>
          <div class="topBarAddress">
            <i class="fas fa-location-arrow"></i>&nbsp;&nbsp;
            <span>Dimitrija Tucovića 119b, 11000 Beograd</span>&nbsp;&nbsp;
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div class="d-flex justify-content-center p-2">
          <a href="{{ route('home') }}" class="logo"></a>
        </div>
      </div>
    </div>
    <nav class="navbar public navbar-expand-lg shadow">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          @yield('nav_title')
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <i class="fas fa-phone"></i><span>&nbsp; +381(11) 2406-314</span>
            </li>
          </ul>

          <div class="dropdown-divider"></div>

          <!-- Center Of Navbar -->
          <ul class="navbar-nav center">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu animate" aria-labelledby="navbarDropdown">
                @if(count($categories) > 0)
                  @foreach($categories as $category)
                    <a class="dropdown-item" href="{{ route('showAll', ['category' => $category]) }}">{{ $category->name }}</a>
                  @endforeach
                @endif
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>

          <div class="dropdown-divider"></div>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-secret fa-lg pr-2"></i>
                {{ Auth::user()->FullName }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu animate dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin') }}">Dashboard</a>
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
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>

  </div>
  @include('layouts.public.footer')

</body>

</html>