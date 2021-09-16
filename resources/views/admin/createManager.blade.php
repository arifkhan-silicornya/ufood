@php
    $manager = DB::table('manager')->paginate(3);
    $versity = DB::table('versity')->get();
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
                  <li class="breadcrumb-item"><a href="#">Create Manager Account</a></li>
                </ol>
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                  <li class="breadcrumb-item"><a href="#viewManager">View Manager List</a></li>
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
              <h4 class="card-title">Create Manager Account</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">

              <form role="form" method="post" action="{{ url('/managerCreateAction') }}">
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
                    <input class="form-control" placeholder="Manager Name" type="text" name="managerName" required>
                  </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-university"></i></i></span>
                      </div>
                      <select name="instituteName" id="" required class="form-control">
                          <option value="">Select Your Institute Name</option>
                          @foreach ($versity as $data)
                          <option value="{{ $data->code  }}">{{ $data->instituteName }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email  ID" type="email" name="email" required>
                  </div>
                </div>
                <div class="form-group px-3">
                    <div>Gender :</div>
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="form-check mr-4">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" required>
                        <label class="form-check-label" for="flexRadioDefault1">Male</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" required>
                        <label class="form-check-label" for="flexRadioDefault2">Female</label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                    </div>
                    <input class="form-control" placeholder="National  ID" type="text" name="NID" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contact Number" type="text" name="phoneNumber" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="Home Address" type="text" name="address" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Retype Password" type="password" name="retypePass" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Create New Manager Account</button>
                </div>
              </form>


            </div>
          </div>
        </div>
        <div class="col-12" id="viewManager">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Managers List</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table align-items-center">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">ID</th>
                        <th scope="col" class="sort" data-sort="budget">Name</th>
                        <th scope="col" class="sort" data-sort="completion">Institute Name</th>
                        <th scope="col" class="sort" data-sort="completion">email</th>
                        <th scope="col" class="sort" data-sort="completion">NID</th>
                        <th scope="col" class="sort" data-sort="completion">Phone</th>
                        <th scope="col" class="sort" data-sort="completion">Address</th>
                        <th scope="col" class="sort" data-sort="completion">Status</th>
                        <th scope="col" class="sort" data-sort="completion">Profile Picture</th>
                        <th scope="col" class="sort" data-sort="completion">Create Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($manager as $row)
                    <tr>
                        <td class="budget">
                            {{ $row->id }}
                        </td>
                        <td class="budget">
                            {{ $row->manager_name }}
                        </td>
                        <td class="budget">
                            {{ $row->institute_name }}
                        </td>
                        <td class="budget">
                            {{ $row->email }}
                        </td>
                        <td class="budget">
                            {{ $row->NID  }}
                        </td>
                        <td class="budget">
                            {{ $row->phone }}
                        </td>
                        <td class="budget">
                            {{ $row->address }}
                        </td>
                        <td>
                            @if ($row->active == 1)
                                <span class="text-success">Active </span>
                            @else
                                <span class="text-danger">Disabled</span>
                            @endif
                        </td>
                        <td class="budget">
                            <img src="{{ asset('img/manager/'.$row->profilePicture.'')}}" alt="image" class="img-thumbnail img-fluid" style="width: 70px!important;">
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

                                @if ($row->active == 1)
                                    <a href="{{ url('/banManager?managerid='.$row->id) }}" class="dropdown-item" href="#">Ban</a>
                                @else
                                    <a href="{{ url('/activeManager?managerid='.$row->id) }}" class="dropdown-item" href="#">Do Active</a>
                                @endif

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
                {{ $manager->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="" class="font-weight-bold ml-1" target="">ufood</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="" class="nav-link" target="">About </a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
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
