@php
    $a = Session::get(md5('admin'));
    $admin = DB::table('admin')->where(['userName'=>$a->userName])->get();
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
                      <li class="breadcrumb-item"><a href="#">Admin Profile</a></li>
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
                    @foreach ($admin as $adminProfile )
                    <img src="{{ asset('img/Admin/'.$adminProfile->profilePic) }}" class="rounded-circle img-fluid" alt="img">
                    @endforeach
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center pt-md-6 pt-sm-3 flex-column align-content-center">
                  <div class="row mb-2">
                    <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-info">Dashboard</a>
                    <a href="{{ url('/adminProfile') }}" class="btn btn-sm btn-info">Profile</a>
                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">Set Image</a>
                  </div>
                  <div class="row">
                    <a href="{{ url('/adminorders') }}" class="btn btn-sm btn-default float-right">Orders</a>
                    <a href="#" class="btn btn-sm btn-default float-right" data-toggle="modal"
                      data-target="#passwordModal">Changed Password</a>
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
                      <form method="post" action="{{ url('/adminImageChange') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Formats: jpg, png</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="adminImage" required>
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
                        <form action="/adminChangePass" method="post" >
                            @csrf

                      <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Old</span>
                            </div>
                            <input type="text" class="form-control" required name="oldPass">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">New</span>
                            </div>
                            <input type="text" class="form-control" required name="password">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-sm">Confirm New</span>
                            </div>
                            <input type="text" class="form-control" required name="retypePassword">
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
                <h5 class="h3 text-capitalize">
                    @foreach ($admin as $adminProfile )
                  {{ $adminProfile->userName }}
                  @endforeach
                </h5>
                <div class="h5 font-weight-900">
                  <i class="ni location_pin mr-2"></i>Poland
                </div>
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
                </div>
              </div>
              @if(session()->has('error'))
                    <div class="alert alert-block {{session('alert')}}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
            </div>
            <div class="card-body">
              <form action="/adminNameChanged" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        @foreach ($admin as $adminProfile )
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{ $adminProfile->userName }}" name="adminName">
                        <input type="text" class="d-none" placeholder="Username" value="{{ $adminProfile->userName }}" name="prevName">
                        @endforeach
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                          <button type="submit" class="btn btn-outline-primary">Change UserName</button>
                      </div>
                    </div>


                  </div>

                </div>


              </form>
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
