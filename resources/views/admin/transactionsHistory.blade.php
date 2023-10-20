@php
    $recharge_user = DB::table('recharge_user')->paginate(5);
@endphp
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
                      <li class="breadcrumb-item " aria-current="page"><a href="#"> Recharge History </a></li>
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
                  <h3 class="mb-0">Recharge History</h3>
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
                      <th scope="col" class="sort" data-sort="budget">User ID.</th>
                      <th scope="col" class="sort" data-sort="budget">User Name</th>
                      <th scope="col" class="sort" data-sort="budget">Amount</th>
                      <th scope="col" class="sort" data-sort="budget">Recharged By</th>
                      <th scope="col" class="sort" data-sort="completion">Time</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="list">

@foreach ( $recharge_user as $row )


                    <tr>
                      <td class="budget">#{{ $row->id }}</td>
                      <td class="budget">{{ $row->accountNumber }}</td>
                      <td class="budget">{{ $row->userID }}</td>
                      <td class="budget">{{ $row->userName }}</td>
                      <td class="budget">{{ $row->amount }}</td>
                      <td class="budget">{{ $row->rechargedBy }}</td>
                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">{{ $row->created_at  }}</span>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Report</a>
                          </div>
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
