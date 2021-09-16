<!DOCTYPE html>
<html>

<head>
    {{ View::make('head') }}
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/brand/ufood-white.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ asset('/') }}">
                <img src="{{ asset('img/brand/ufood-blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{ asset('/') }}" class="nav-link">
              <span class="nav-link-inner--text">Menu</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a href="{{ asset('/register') }}" class="btn btn-neutral btn-icon">
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome to UFood!</h1>
              <p class="text-lead text-white">Food Delivery System for Institutions.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <p class="text-danger font-weight-bold">Enter new password and confirm the process.</p>
              </div>
              <form role="form" action="/setNewPassword" method="POST">
                @csrf
                @if(isset($error))
                    <div class="alert alert-block {{$alert}}">
                        <button type="button" class="close m-1" data-dismiss="alert">×</button>
                        <strong>{{ $error }}</strong>
                    </div>
                @endif
                <div class="form-group mb-3 d-none">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control" placeholder="Re-type Password" type="email" name="email" required value="{{ $usermailAddress }}" readonly>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Password " type="password" name="password" required>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control" placeholder="Re-type Password" type="password" name="retypePAss" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Send</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{ ('/login') }}" class="text-light"><small>Login</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{ url('/register') }}" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2021 <a href="{{ url('/') }}" class="font-weight-bold ml-1" >uFood</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link" >Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link" >About</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- uFood Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- uFood JS -->
  <script src="{{ asset('js/ufood.js?v=1.2.0') }}"></script>
</body>

</html>
