<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('/assets/img/sidebar-1.jpg') }}">
  <div class="logo"><a href="{{ url('/') }}" class="simple-text logo-normal">
      Warung Irfan
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard')?'active':''}}  ">
        <a class="nav-link" href="{{ url('dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('categories')?'active':''}} ">
        <a class="nav-link" href="{{ url('categories') }}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-categories')?'active':''}} ">
        <a class="nav-link" href="{{ url('add-categories') }}">
          <i class="material-icons">add</i>
          <p>Add Categories</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('menu')?'active':''}} ">
        <a class="nav-link" href="{{ url('menu') }}">
          <i class="material-icons">list</i>
          <p>menu</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-menu')?'active':''}} ">
        <a class="nav-link" href="{{ url('add-menu') }}">
          <i class="material-icons">add</i>
          <p>Add menu</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('orders-list')?'active':''}}">
        <a class="nav-link" href="{{ url('orders-list') }}">
          <i class="material-icons">content_paste</i>
          <p>Orders</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('users-list')?'active':''}}">
        <a class="nav-link" href="{{ url('users-list') }}">
          <i class="material-icons">person</i>
          <p>Users</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('chat')?'active':''}}">
        <a class="nav-link" href="{{ url('chat') }}">
          <i class="material-icons">chat</i>
          <p>Chat</p>
        </a>
      </li>
      <li class="nav-item {{ Request::is('add-chat')?'active':''}} ">
        <a class="nav-link" href="{{ url('add-chat') }}">
          <i class="material-icons">add</i>
          <p>Add Chat</p>
        </a>
      </li>
    </ul>
  </div>
</div>


{{-- 
<div class="sidebar">
    <a class="{{ Request::is('dashboard')?'active':''}}" href="{{ url('dashboard') }}"><i class="material-icons">dashboard</i>
      Dashboard</a>

  <a class="{{ Request::is('categories')?'active':''}}" href="{{ url('categories') }}"><i class="material-icons">category</i>
    Categories</a>
    <a class="{{ Request::is('add-categories')?'active':''}}" href="{{ url('add-categories') }}"><i class="material-icons">add</i>
      Add Categories</a>
    <a class="{{ Request::is('menu')?'active':''}}" href="{{ url('menu') }}"><i class="material-icons">list</i>
      Menues</a>
    <a class="{{ Request::is('add-menu')?'active':''}}" href="{{ url('add-menu') }}"><i class="material-icons">add</i>
      Add Menu</a>
    <a class="{{ Request::is('orders-list')?'active':''}}" href="{{ url('orders-list') }}"><i class="material-icons">content_paste</i>
      Orders</a>
    <a class="{{ Request::is('users-list')?'active':''}}" href="{{ url('users-list') }}"><i class="material-icons">person</i>
      Users</a>
      <a class="{{ Request::is('add-chat')?'active':''}}" href="{{ url('add-chat') }}"><i class="material-icons">add</i>
        Add Chat</a>
    <a class="{{ Request::is('chat')?'active':''}}" href="{{ url('chat') }}"><i class="material-icons">chat</i>
      Chat</a>
    
</div> --}}