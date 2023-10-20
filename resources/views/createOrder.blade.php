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

{{ View::make('sideNav') }}


  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <div class="sticky-top">
        {{ View::make('header') }}
    </div>
    <div class="container-fluid mt-5">
    @if(session()->has('error'))
            <div class="alert alert-block {{session('alert')}}">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('error') }}</strong>
            </div>
            @endif
    @foreach ($users as $item)
    @if (Session::get(md5('ufoodUser'))['studentid']  == $item->studentid  )
    <form action="{{ url('/orderCreate') }}" method="post">
      @csrf
        <h1 class=" mb-4">Checkout Information</h1>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Delivery Address <i class="far fa-badge-check text-danger">*</i> </label>
                        @if ($item->address == null)
                        @php
                            $address = '';
                        @endphp
                    @else
                        @php $address = $item->address;@endphp
                    @endif
                        <input id="input-address" class="form-control" placeholder="Delivery Address. Example : Room-404" name="deliveryAddress"
                          value="{{ $address }}" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Phone<i class="far fa-badge-check text-danger">*</i></label>
                        @if ($item->contact == null)
                        @php
                            $contact = '';
                        @endphp
                    @else
                        @php $contact = $item->contact;@endphp
                    @endif
                        <input id="input-address" class="form-control" placeholder="Phone Number"
                          value="0{{ $contact }}" type="text" required name="phoneNumber">
                      </div>
                    </div>
                  </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"   id="flexCheckDefault" required onclick="disableBtn()">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree to the <a href="#" class="text-danger">Terms & Conditions</a>  and <a href="#" class="text-danger">Purchasing Policy</a>  of UFood.
                                </label>
                            </div>
                        </div>
                    </div>

                <a href="{{ url('/') }}" class="btn btn-outline-primary px-7 my-3"><i class="far fa-hand-point-left mx-3"></i>Go Back</a>
                <button type="submit" class="btn btn-outline-danger px-8 my-3" id="submit">Save Info</button>
            </div>

    </form>

@endif
@endforeach

    </div>








      <div class="py-6 my-6"></div>
    <!-- Page content -->
    {{-- footer --}}
    {{ View::make('footer') }}

  </div>
  <!-- uFood Scripts -->
  <!-- Core -->

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

  <script>

function disableBtn() {
    var checkBox = document.getElementById("flexCheckDefault");
    var submit = document.getElementById("submit");

if (checkBox.checked == true){
    submit.disabled = false;
  } else {
    submit.disabled = true;
  }
}

  </script>
</body>

</html>
