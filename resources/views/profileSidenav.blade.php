<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('img/brand/ufood-blue.png') }}" class="navbar-brand-img" alt="brand">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Food Menu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/orders') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Orders</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/transactions') }}">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/profile') }}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
