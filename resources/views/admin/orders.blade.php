
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
    <div class="header pb-6 d-flex align-items-center " style="min-height: 300px; background-image: url({{ asset('img/theme/img-1-1000x600.jpg') }}); background-size: cover; background-position: center top;">
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
                      <li class="breadcrumb-item"><a href="#">Orders List</a></li>
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
                <div class="col-5">
                  <h3 class="mb-0">Orders </h3>
                </div>
                <div class="col-7">
                    {{-- <form action="" method="post">
                        @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ORDER ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" type="button">Button</button>
                        </div>
                      </div>
                    </form> --}}
                </div>
              </div>
            </div>

            <div class="table-responsive">

              <div>
                <table class="table align-items-center">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="budget">Invoice No.</th>
                      <th scope="col" class="sort" data-sort="budget">Customer ID.</th>
                      <th scope="col" class="sort" data-sort="budget">Customer Name.</th>
                      <th scope="col" class="sort" data-sort="budget">Customer Address.</th>
                      <th scope="col" class="sort" data-sort="budget">Price</th>
                      <th scope="col" class="sort" data-sort="status">Payment Type</th>
                      <th scope="col" class="sort" data-sort="status">Status</th>

                      <th scope="col" class="sort" data-sort="completion">Order Time</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>

                  <tbody class="list">
                    @foreach ($orders as $row)
                    @php
                        $users = DB::table('users')->where(['studentid'=>$row->customer_id])->first();
                    @endphp
                    <tr>
                      {{-- <th scope="row">
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="{{ asset('img/theme/bootstrap.jpg') }}">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">Shingara</span>
                          </div>
                        </div>
                      </th> --}}
                      <td class="budget">
                        #{{ $row->id }}
                      </td>
                      <td class="budget">
                        {{ $row->customer_id }}
                      </td>
                      <td class="budget">
                        {{ $row->customer_name }}
                      </td>
                      <td class="budget">
                        {{ $row->customer_address }}
                      </td>
                      <td class="budget">
                        {{ $row->total_Price }}
                      </td>
                      <td class="budget">
                        {{ $row->payment_type }}
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-info"></i>
                          <span class="status">{{ $row->status }}</span>
                        </span>
                      </td>

                      <td>
                        <div class="d-flex align-items-center">
                          <span class="completion mr-2">{{ $row->created_at }}</span>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ url('/adminConfirmOrder?orderid='.$row->id) }}">Confirm</a>
                            <a class="dropdown-item" href="{{ url('/adminCancelOrder?orderid='.$row->id) }}">Cancel</a>
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
                    {{ $orders->links('pagination::bootstrap-4') }}
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
