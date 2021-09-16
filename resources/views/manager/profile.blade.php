@if (session()->has(md5('manager')))
@php
    $manager = Session::get(md5('manager'));
    $managr = DB::table('manager')->where(['email'=>$manager->email])->first();

    $versity = DB::table('versity')->where(['code'=>$managr->institute_name])->first();

@endphp

@endif
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
                      <li class="breadcrumb-item"><a href="#">Manager Profile</a></li>
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
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{ asset('img/manager/'.$managr->profilePicture) }}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center pt-md-6 pt-sm-3 flex-column align-content-center">
                  <div class="row mb-2">
                    <a href="{{ url('/managerDashboard') }}" class="btn btn-sm btn-info">Dashboard</a>
                    <a href="{{ url('/managerProfile') }}" class="btn btn-sm btn-info">Profile</a>
                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">Set Image</a>
                  </div>
                  <div class="row">
                    <a href="{{ url('/managerOrders') }}" class="btn btn-sm btn-default float-right">Orders</a>
                    <a href="{{ url('/managerTransactionsHistory') }}" class="btn btn-sm btn-default float-right">Transactions</a>
                    <a href="#" class="btn btn-sm btn-default float-right" data-toggle="modal"
                      data-target="#passwordModal">Password</a>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Change profile image</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ url('/managerPicChange') }}" enctype="multipart/form-data">
                          @csrf

                        <div class="form-group">
                          <input type="email" required value="{{ $managr->email }}" name="email" class="form-control d-none"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Formats: jpg, png</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" required name="image">
                        </div>
                        <div class="modal-footer">
                          <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>

              <!-- passowrd Modal -->
              <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="passwordModalLabel">Change Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/managerPassword') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <input type="email" required value="{{ $managr->email }}" name="email" class="form-control d-none"  readonly>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Old</span>
                            </div>
                            <input type="text" class="form-control" name="oldPass" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">New</span>
                            </div>
                            <input type="text" class="form-control" name="password" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Confirm New</span>
                            </div>
                            <input type="text" class="form-control" name="RetypePass" required>
                          </div>
                        </div>

                        <div class="modal-footer">
                            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">

              <div class="text-center">
                <h5 class="h3">
                    {{ $managr->manager_name }}
                </h5>
                <div>{{ $versity->instituteName }}</div>
                <div class="h5 font-weight-700">Dhaka, Bangladesh</div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                  <div class="col-12">
                    @if(session()->has('error'))
                    <div class="alert alert-block {{session('alert')}}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="{{ url('/updateProfileManager') }}">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{ $managr->manager_name }}" name="name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" placeholder="email" readonly value="{{ $managr->email  }}" name="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="gender">Gender</label>
                        <input type="text" id="gender" class="form-control" placeholder="Gender"  value="{{ $managr->gender  }}" name="gender">
                      </div>
                    </div>
                  </div>
                </div>


                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <input class="form-control" placeholder="Home Address" value="{{ $managr->address  }}" type="text" name="address">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Phone</label>
                        <input id="input-address" class="form-control" placeholder="Phone Number" type="number" min="999999999" required value="{{ $managr->phone  }}" name="phone">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">NID</label>
                        <input type="text" id="input-city" class="form-control" placeholder="NID" readonly value="{{ $managr->NID  }}" name="NID">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12 w-50 ">
                        <button type="submit" class="w-50 mx-auto btn btn-outline-success px-5"> Save Info</button>
                    </div>
                </div>
                </div>





              </form>
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
