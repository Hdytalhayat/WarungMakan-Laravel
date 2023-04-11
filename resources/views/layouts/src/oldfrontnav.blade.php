<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Warung Irfan</a>
      <div class="search-bar">
        <form action="{{ url('searh-menu') }}" method="POST">
          @csrf
        <div class="input-group">
          <input name="serve_name" id="search_serve" type="search" class="form-control" placeholder="Search" required >
          <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
        </div>
      </form>
      </div>
      
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
              Favorite
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