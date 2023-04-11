<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Warung Makan<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    

    <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <div class="search-box">
          <button class="btn-search"><i class="fas fa-search"></i></button>
          <form action="{{ url('/search-menu') }}" method="POST">
            @csrf
          <input type="text" class="input-search " name="menu_name" id="search_menu" placeholder="Type to Search..." required>
          </form>
        </div>
        <li class="nav-item {{ Request::is('/')?'active':''}}">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item {{ Request::is('view-categories')?'active':''}}">
          <a class="nav-link" href="{{ url('view-categories') }}">Shop</a>
        </li>
        <li class="nav-item {{ Request::is('about-us')?'active':''}}">
          <a class="nav-link " href="{{ url('about-us')}}">About us</a>
        </li>
        @guest
              @if (Route::has('login'))
                <li class="nav-item {{ Request::is('login')?'active':''}}">
                  <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                </li>
                
              @endif
              @if (Route::has('register'))
                <li class="nav-item {{ Request::is('register')?'active':''}}">
                  <a class="nav-link" href="{{ url('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
          @else
          <li class="nav-item {{ Request::is('cart')?'active':''}}">
            <a class="nav-link" href="{{ url('cart') }}">
              <i class="material-symbols-outlined">
                shopping_cart
              </i>
              <span class="badge badge-pill bg-primary cart-count">0</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('wishlist')?'active':''}}">
            <a class="nav-link" href="{{ url('wishlist') }}">
              <i class="material-symbols-outlined">
                favorite
              </i>
              <span class="badge badge-pill bg-danger wishlist-count">0</span>
            </a>
          </li>
          {{-- <li class="nav-item {{ Request::is('/cart')?'active':''}}">
              <a class="nav-link" href="{{url('/cart')}}">
                <i class="material-symbols-outlined">
                  shopping_cart
                </i>
                <span class="badge badge-pill bg-primary cart-count">0</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('/wishlist')?'active':''}}">
              <a class="nav-link" href="{{url('/wishlist')}}">
                <i class="material-symbols-outlined">
                  favorite
                </i>
                <span class="badge badge-pill bg-danger cart-count">0</span>
              </a>
            </li> --}}
            <li class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-symbols-outlined">
                  person
                </i>
              </a>
              <ul class="dropdown-menu text-black bg-white" aria-labelledby="navbarDropdown">
                
                @if (Auth::user()->role_as == '1')
                <li>
                  <a href="{{ url('/dashboard') }}" class="dropdown-item warna">My Dashboard</a>
                </li>  
                @endif
                <li>
                  <a href="{{ url('my-order') }}" class="dropdown-item warna">My Orders</a>
                </li>
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item warna">{{ __('Logout') }}</a>
                  <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
                </li>
              </ul>
              
            </li>
            
            
          
          @endguest

      </ul>
    </div>
  </div>
    
</nav>

<!-- End Header/Navigation -->