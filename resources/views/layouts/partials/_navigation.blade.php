<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('images/AdminLTELogo.png ')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      @guest
        <!-- <a href="{{ route('login') }}">Login</a> -->
        <!-- <a href="{{ route('register') }}">Register</a> -->
      @else
      <div class="image">
        <img src="{{ asset('images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="/" class="d-block">  {{ Auth::user()->username }}</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
      </form>
      @endguest

    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{url('home')}}" class="nav-link {{ Request::is('home','/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class=""></i>
            </p>
            </a>
            <a href="{{url('users')}}" class="nav-link {{ Request::is('users','adduser','edituser*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          <a href="{{url('configuration')}}" class="nav-link {{ Request::is('configuration*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configuration
              </p>
            </a>
            <a href="{{url('banner')}}" class="nav-link {{ Request::is('banner*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-images"></i>
              <p>
                Banner
              </p>
            </a>
            <a href="{{url('category')}}" class="nav-link {{ Request::is('category*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-list"></i>
              <p>
                Category
              </p>
            </a>
            <a href="{{url('product')}}" class="nav-link {{ Request::is('product/*','product') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box-open"></i>
              <p>
                Products
              </p>
            </a>
            <a href="{{url('product_attributes')}}" class="nav-link {{ Request::is('product_attributes*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box-open"></i>
              <p>
                Product Attributes
              </p>
            </a>
            <a href="{{url('coupon')}}" class="nav-link {{ Request::is('coupon*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box-open"></i>
              <p>
               Coupon
              </p>
            </a>
      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
