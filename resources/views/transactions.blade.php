<!DOCTYPE html>
<html>

<head>
    {{ View::make('head') }}
</head>

<body>
  <!-- Sidenav -->
  {{ View::make('profileSidenav') }}

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <div class="sticky-top">
        {{ View::make('header') }}
    </div>

    <!-- Header -->
    <div class="header py-0 my-0  d-flex align-items-center" style="min-height: 300px; background-image: url({{ asset('img/theme/img-1-1000x600.jpg') }}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid ">
          <div class="row">
            <div class="col-12 ">
              <h1 class="display-2 text-white">Hello Chaity</h1>
            </div>
          </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-7">
                  <h3 class="mb-0">Transactions History</h3>
                </div>
              </div>
            </div>

        <div class="row">

          <div class="col-md-12">
            <div class="table-responsive">
                <table class="table align-items-center">
                  <thead class="thead">
                    <tr>
                      <th scope="col" class="sort" data-sort="budget">Recharge Transactions</th>
                    </tr>
                  </thead>
                  <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">Transaction No.</th>
                        <th scope="col" class="sort" data-sort="budget">Account Number.</th>
                        <th scope="col" class="sort" data-sort="budget">Amount</th>
                        <th scope="col" class="sort" data-sort="budget">Recharged By</th>
                        <th scope="col" class="sort" data-sort="completion">Time</th>
                    </tr>
                  </thead>
                  <tbody class="list">
@foreach ( $recharge_user as $row )
                    <tr>
                        <td class="budget">#{{ $row->id }}</td>
                        <td class="budget">{{ $row->accountNumber }}</td>
                        <td class="budget">{{ $row->amount }}</td>
                        <td class="budget">{{ $row->rechargedBy }}</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <span class="completion mr-2">{{ $row->created_at  }}</span>
                          </div>
                        </td>
                    </tr>
@endforeach
                  </tbody>
                </table>
            </div>


            <div class="card-footer py-4">
              {{ $recharge_user->links('pagination::bootstrap-4') }}
            </div>


          </div>
        </div>

          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">uFood</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- uFood Scripts -->

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

 <!-- Core -->
 <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
 <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
 <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
 <!-- uFood JS -->
 <script src="{{ asset('js/ufood.js?v=1.2.0') }}"></script>
</body>

</html>
