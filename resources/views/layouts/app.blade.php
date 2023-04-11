<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">E-menuz</a>
              
              
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('/')?'active':''}} " href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('view-categories')?'active':''}}" href="{{ url('view-categories') }}">Categories</a>
                  </li>
                  
        
                  @guest
                      @if (Route::has('login'))
                        <li class="nav-item">
                          <a class="nav-link {{ Request::is('login')?'active':''}}" href="{{ url('login') }}">{{ __('Login') }}</a>
                        </li>
                        
                      @endif
                      @if (Route::has('register'))
                        <li class="nav-item">
                          <a class="nav-link {{ Request::is('register')?'active':''}}" href="{{ url('register') }}">{{ __('Register') }}</a>
                        </li>
                      @endif
                  @else
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('cart')?'active':''}}" href="{{ url('cart') }}">
                      Cart
                      <span class="badge badge-pill bg-success cart-count">0</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('wishlist')?'active':''}}" href="{{ url('wishlist') }}">
                      Wishlist
                      <span class="badge badge-pill bg-danger wishlist-count">0</span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      @if (Auth::user()->role_as == '1')
                      <li>
                        <a href="{{ url('/dashboard') }}" class="dropdown-item">My Dashboard</a>
                      </li>  
                      @endif
                      <li>
                        <a href="{{ url('my-order') }}" class="dropdown-item">My Orders</a>
                      </li>
                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}</a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
                      </li>
                    </ul>
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
</body>
</html>
