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
              <a class="nav-link active" href="{{ url('/managerDashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerOrders') }}">
                <i class="fas fa-store text-primary"></i>
                <span class="nav-link-text">Orders List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerProfile') }}">
                <i class="ni ni-single-02 text-dark"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerUserList') }}">
                <i class="fas fa-users text-primary"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerFoodList') }}">
                <i class="fas fa-utensils text-success"></i>
                <span class="nav-link-text">View Food List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerAddNewItem') }}">
                <i class="fas fa-utensils text-danger"></i>
                <span class="nav-link-text">Add Food Item</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerRechargeUser') }}">
                <i class="far fa-credit-card text-success"></i>
                <span class="nav-link-text">Recharge Users </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/managerTransactionsHistory') }}">
                <i class="fas fa-history text-dark"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
