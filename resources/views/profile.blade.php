@php
    $users = DB::table('users')->get();
    $user_account = DB::table('user_account')->get();
@endphp
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
    @foreach ($users as $item)
        @if (Session::get(md5('ufoodUser'))['studentid']  == $item->studentid  )

    <!-- Header -->
    <div class="header py-0 my-0  d-flex align-items-center" style="min-height: 300px; background-image: url({{ asset('img/theme/img-1-1000x600.jpg') }}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid ">
        <div class="row">
          <div class="col-12 ">
            <h1 class="display-2 text-white">Hello {{ $item->name }}</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        {{ View::make('profileRightContent') }}


        <div class="col-xl-9 order-xl-1">
          <div class="card">
            @if(session()->has('error'))
            <div class="alert alert-block {{session('alert')}}">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('error') }}</strong>
            </div>
            @endif
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ url('/userProfileUpdate') }}">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{ $item->name }}" name="name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" placeholder="Email Address" value="{{ $item->email }}" readonly name="email">
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Gender</label>

                            @if ($item->gender == null)
                                @php
                                    $gender = '';
                                @endphp
                            @else
                                @php $gender = $item->gender;@endphp
                            @endif


                        <input type="text" id="input-last-name" class="form-control text-capitalize" placeholder="Gender" value="{{ $gender }}" name="gender">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Academic information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">User Type</label>
                        @if ($item->usertype == null)
                                @php
                                    $userType = '';
                                @endphp
                            @else
                                @php $userType = $item->usertype;@endphp
                            @endif

                        <input id="input-address" class="form-control" placeholder="User Type" value="{{ $userType }}" type="text" name="userType">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Department</label>
                        @if ($item->department == null)
                                @php
                                    $department = '';
                                @endphp
                            @else
                                @php $department = $item->department;@endphp
                            @endif
                        <input type="text" id="input-city" class="form-control" placeholder="Department EX:- CSE" value="{{ $department }}" name="department">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Batch</label>
                        @if ($item->batch == null)
                        @php
                            $batch = '';
                        @endphp
                    @else
                        @php $batch = $item->batch;@endphp
                    @endif
                        <input type="text" id="input-country" class="form-control" placeholder="Batch" value="{{ $batch }}" name="batch">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">ID</label>
                        <input type="text" id="input-country" class="form-control" placeholder="ID" value="{{ $item->studentid }}" readonly>
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
                        <label class="form-control-label" for="input-address">Delivery Designation</label>
                        @if ($item->address == null)
                        @php
                            $address = '';
                        @endphp
                    @else
                        @php $address = $item->address;@endphp
                    @endif
                        <input id="input-address" class="form-control" placeholder="Delivery Address" name="deliveryAddress"
                          value="{{ $address }}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Phone</label>
                        @if ($item->contact == null)
                        @php
                            $contact = '';
                        @endphp
                    @else
                        @php $contact = $item->contact;@endphp
                    @endif
                        <input id="input-address" class="form-control" placeholder="Phone Number" name="contact"
                          value="{{ $contact }}" type="text">
                      </div>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-outline-primary px-5 mx-4">Save Info</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      {{ View::make('footer') }}
    </div>

    @endif
    @endforeach
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
