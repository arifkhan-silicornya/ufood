
<!DOCTYPE html>
<html>

<head>
    {{ View::make('admin.head') }}
</head>

<body>
  <!-- Sidenav -->
  {{ View::make('admin.sideNav') }}
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    {{ View::make('admin.topNav') }}

    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-image: url({{ asset('img/theme/img-1-1000x600.jpg') }}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="row align-items-center py-4">
                <div class="col-lg-12 col-12">
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                      <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                      <li class="breadcrumb-item " aria-current="page"><a href="#"> Recharge </a></li>
                    </ol>
                  </nav>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--8">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">

              <div class="row align-items-center">
                <div class="col-7">
                  <h3 class="mb-0">Recharge Users</h3>
                </div>
                <div class="col-5">
                    @if(session()->has('error'))
                    <div class="alert alert-block {{session('alert')}}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                    @endif
                </div>
              </div>
            </div>

        <div class="row">
          <div class="col-md-12 pb-5">
            <div class="mx-5 w-75" id="moneyRecharge" style="display: block;">
                <form action="{{ URL('/adminRechargeUser') }}" class="w-100 mx-auto border d-flex flex-row border-info my-5" method="post">
                    @csrf
                <span class="btn btn-info w-25 " disabled> Search User By ID : </span>
                <input class="form-control border border-info w-50 " type="number" placeholder="Eenter User ID" name="idToSearch" min="1" required>
                <button class="btn btn-outline-info w-25 " type="submit" >Search</button>
                </form>



@isset($user_account)



    <h3 class="my-3 text-center text-info font-weight-bold">Recharge Amount To User Account</h3>
    <form method="post" action="{{ url('/adminMoneyRecharge') }}" class="w-75 mx-auto border border-info p-3">
        @csrf
    <div class="form-group border border-info" >
        <input value="{{ $user_account->name }}" class="form-control " type="text" name="user_name" required  readonly onclick="alert('User Name\n\nNot Editable ');" >
    </div>
    <div class="form-group border border-info" >
        <input value="{{ $user_account->current_money }}" class="form-control " type="text" name="current_money" readonly onclick="alert(' Current Balance\n\nNot Editable ');">
    </div>
    <div class="form-group border border-info">
        <input value="{{ $user_account->user_id }}" class="form-control " type="number" name="User_id" min="0" required  readonly onclick="alert(' User ID\n\nNot Editable ');">
    </div>
    <div class="form-group border border-info">
        <input value="{{ $user_account->id }}" class="form-control " type="number" name="account" min="0" required  readonly onclick="alert(' User Account No.\n\nNot Editable ');">
    </div>

    <div class="form-group  border border-info">
        <input class="form-control " type="number" placeholder="Amount" name="rechrg_Amount" required>
    </div>
    <div class="form-group  border border-info">
        <input class="form-control " type="password" placeholder="Pin Number" name="pinNumber" min="0" required>
    </div>
    <div class="form-group">
        <button class="btn btn-outline-info w-100" type="submit"><strong>Recharge</strong></button>
    </div>

    </form>
@endisset
            </div>





          </div>
        </div>

          </div>
        </div>
      </div>
      <!-- Footer -->
      {{ View::make('admin.footer') }}
    </div>
  </div>
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
