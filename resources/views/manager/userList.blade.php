@php
    $manager = Session::get(md5('manager'));
    $managr = DB::table('manager')->where(['email'=>$manager->email])->first();
    $users = DB::table('users')->where(['instituteName'=>$managr->institute_name])->paginate(5);
@endphp
<!DOCTYPE html>
<html>

<head>
    {{ View::make('manager.head') }}
</head>

<body>
  <!-- Sidenav -->
  {{ View::make('manager.sideNav') }}

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    {{ View::make('manager.topNav') }}

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
                  <li class="breadcrumb-item " aria-current="page"><a href="#">List of All Registered Users</a></li>
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

        <div class="col-xl-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Users</h6>
                </div>
              </div>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table align-items-center">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort">Serial No.</th>
                          <th scope="col" class="sort">Picture</th>
                          <th scope="col" class="sort">User Name</th>
                          <th scope="col" class="sort">University Name</th>
                          <th scope="col" class="sort">Users E-mail</th>
                          <th scope="col" class="sort">Users ID</th>
                          <th scope="col" class="sort">Users Type</th>
                          <th scope="col" class="sort">Phone Number</th>
                          <th scope="col" class="sort">Department</th>
                          <th scope="col" class="sort">Batch</th>
                          <th scope="col" class="sort">Gender</th>
                          <th scope="col" class="sort">Address</th>
                          <th scope="col" class="sort">Account Verified</th>
                          <th scope="col" class="sort">Account Disbled</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody class="list">

                        @foreach ($users as $allUsers )
                        <tr>
                          <td class="budget">
                            {{ $allUsers->id }}
                          </td>
                          <td class="budget">
                            <img src="{{ asset('img/user/picture/'.$allUsers->profilePic) }}" alt="img" class="rounded-circle img-fluid" height="40" width="40">
                          </td>
                          <td class="budget">
                            {{ $allUsers->name }}
                          </td>
                          <td class="budget">
                            {{ $allUsers->instituteName }}
                          </td>
                          <td class="budget">
                            {{ $allUsers->email }}
                          </td>
                          <td class="budget">
                            {{ $allUsers->studentid }}
                          </td>
                          <td class="budget">
                            {{ $allUsers->usertype }}
                          </td>
                          <td class="budget">
                          {{ $allUsers->contact }}
                          </td>
                          </td>
                          <td class="budget">
                          {{ $allUsers->department }}
                          </td>
                          <td class="budget">
                           {{ $allUsers->batch }}
                          </td>
                          <td class="budget">
                           {{ $allUsers->gender }}
                          </td>
                          <td class="budget">
                           {{ $allUsers->address }}
                          </td>
                          <td class="budget">
                            @php
                                if ($allUsers->verified == 0) {
                                    echo "<div  class='btn btn-sm btn-success'>Yes</div>";
                                }
                            @endphp
                            @php
                                if ($allUsers->verified == 1) {
                                    echo "<div class='btn btn-sm btn-danger'>No</div>";
                                }
                            @endphp
                          </td>
                          <td class="budget" >
                                @php
                                if ($allUsers->deleted == 0) {
                                    echo "<div  class='btn btn-sm btn-danger'>Yes</div>";
                                }
                                @endphp
                                @php
                                    if ($allUsers->deleted == 1) {
                                        echo "<div class='btn btn-sm btn-success'>No</div>";
                                    }
                                @endphp
                            </td>
                          <td class="text-right">
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">Edit</a>
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
                {{ $users->links('pagination::bootstrap-4') }}
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
