@php
    $versity = DB::table('versity')->paginate(3);
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
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                  <li class="breadcrumb-item"><a href="#">Create New Institute </a></li>
                </ol>
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                  <li class="breadcrumb-item"><a href="#viewManager">View Institute List</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-6 mx-auto">
          <div class="card">
            <div class="card-header text-center border-bottom-0">
              <h4 class="card-title">Create New Institute</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">

              <form role="form" method="post" action="{{ url('/instituteCreateAction') }}">
                  @csrf
                  @if(session()->has('error'))
                  <div class="alert alert-block {{session('alert')}}">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ session('error') }}</strong>
                  </div>
                @endif
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Institute Name" type="text" name="instituteName" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                    </div>
                    <input class="form-control" placeholder="Institute Code" type="text" name="instituteCode" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="Campus Name" type="text" name="campus" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create New Institute</button>
                </div>
              </form>


            </div>
          </div>
        </div>
        <div class="col-6" id="viewManager">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Institute List</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table align-items-center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">ID</th>
                        <th scope="col" class="sort" data-sort="completion">Institute Name</th>
                        <th scope="col" class="sort" data-sort="completion">Code</th>
                        <th scope="col" class="sort" data-sort="completion">Campus Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($versity as $row)
                    <tr>
                        <td class="budget">
                            {{ $row->id }}
                        </td>
                        <td class="budget">
                            {{ $row->instituteName }}
                        </td>
                        <td class="budget">
                            {{ $row->code   }}
                        </td>
                        <td class="budget">
                            {{ $row->campusName }}
                        </td>
                        </td>
                        <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Report</a>
                            <a class="dropdown-item" href="#">Ban</a>
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $versity->links('pagination::bootstrap-4') }}
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
