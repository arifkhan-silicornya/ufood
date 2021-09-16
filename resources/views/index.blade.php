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
    {{-- Breakfast --}}
    <div class="header bg-white pb-5 pt-0 " id="Breakfast">
        <div class="container-fluid">
          <h1>Breakfast</h1>
          <p>Breakfast items available till 11.00 AM.</p>
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
@if (session()->has(md5('ufoodUser')))
              @foreach ($products as $row)
              @if ( $row->pro_category == 'breakfast' && $row->pro_quantity > 0)
              <div class="col-xl-3 col-md-6">
                <div class="card">
                  <img class="card-img-top img-fluid" src="{{ asset('img/products/'.$row->pro_img_name.'')}}" alt="Card image cap" height="200" width="320" style="height:200px!important;">
                  <div class="card-body">
                    <h2 class="card-title">{{ $row->pro_name }}</h2>
                    <h3 class="card-text">{{ $row->pro_price }} TK</h3>
                    <h5 class="card-text">Stock: {{ $row->pro_quantity }} pc</h5>
                    <p class="card-text">{{ $row->pro_details }}</p>
                    @if (session()->has(md5('ufoodUser')))
                    <form action="{{ url('/addToCart') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Quantity" required name="quantity" min="1" max="{{ $row->pro_quantity }}">
                            <input type="text" class="form-control d-none" required name="productID" value="{{ $row->id }}">
                            <input type="text" class="form-control d-none" required name="userID" value="{{ Session::get(md5('ufoodUser'))['studentid'] }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary d-block pt-2 ">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                    @endif
                  </div>
                </div>
              </div>
              @endif
              @endforeach
@endif
            </div>
          </div>
        </div>
    </div>

    {{-- Lunch --}}
    <div class="header bg-white pb-6 pt-0" id="Lunch">
        <div class="container-fluid">
          <h1>Lunch</h1>
          <p>Lunch items available till 3.00 AM.</p>
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
@if (session()->has(md5('ufoodUser')))
                @foreach ($products as $row)
                @if ( $row->pro_category == 'lunch'  && $row->pro_quantity > 0)
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('img/products/'.$row->pro_img_name.'')}}" alt="Card image cap" height="200" width="320" style="height:200px!important;">
                        <div class="card-body">
                          <h2 class="card-title">{{ $row->pro_name }}</h2>
                          <h3 class="card-text">{{ $row->pro_price }} TK</h3>
                          <h5 class="card-text">Stock: {{ $row->pro_quantity }} pc</h5>
                          <p class="card-text">{{ $row->pro_details }}</p>
                          @if (session()->has(md5('ufoodUser')))
                          <form action="{{ url('/addToCart') }}" method="POST">
                              @csrf
                              <div class="input-group mb-3">
                                  <input type="number" class="form-control" placeholder="Quantity" required name="quantity" min="1" max="{{ $row->pro_quantity }}">
                                  <input type="text" class="form-control d-none" required name="productID" value="{{ $row->id }}">
                                  <input type="text" class="form-control d-none" required name="userID" value="{{ Session::get(md5('ufoodUser'))['studentid'] }}">
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-primary d-block pt-2 ">Add to Cart</button>
                                  </div>
                              </div>
                          </form>
                          @endif
                        </div>
                      </div>
                </div>
                @endif
                @endforeach
@endif

            </div>
          </div>
        </div>
      </div>


    {{-- Drinks --}}
    <div class="header bg-white pb-6 pt-0" id="Drinks">
        <div class="container-fluid">
          <h1>Drinks</h1>
          <p>Drinks items available </p>
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
@if (session()->has(md5('ufoodUser')))

                @foreach ($products as $row)
                @if ( $row->pro_category == 'drinks'  && $row->pro_quantity > 0)
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('img/products/'.$row->pro_img_name.'')}}" alt="Card image cap" height="200" width="320" style="height:200px!important;">
                        <div class="card-body">
                          <h2 class="card-title">{{ $row->pro_name }}</h2>
                          <h3 class="card-text">{{ $row->pro_price }} TK</h3>
                          <h5 class="card-text">Stock: {{ $row->pro_quantity }} pc</h5>
                          <p class="card-text">{{ $row->pro_details }}</p>
                          @if (session()->has(md5('ufoodUser')))
                          <form action="{{ url('/addToCart') }}" method="POST">
                              @csrf
                              <div class="input-group mb-3">
                                  <input type="number" class="form-control" placeholder="Quantity" required name="quantity" min="1" max="{{ $row->pro_quantity }}">
                                  <input type="text" class="form-control d-none" required name="productID" value="{{ $row->id }}">
                                  <input type="text" class="form-control d-none" required name="userID" value="{{ Session::get(md5('ufoodUser'))['studentid'] }}">
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-primary d-block pt-2 ">Add to Cart</button>
                                  </div>
                              </div>
                          </form>
                          @endif
                        </div>
                      </div>
                </div>
                @endif
                @endforeach
@endif

            </div>
          </div>
        </div>
      </div>

    {{-- Dry_Food --}}
    <div class="header bg-white pb-6 pt-0" id="Dry_Food">
        <div class="container-fluid">
          <h1>Dry_Food</h1>
          <p>Dry Food items available </p>
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
@if (session()->has(md5('ufoodUser')))

                @foreach ($products as $row)
                @if ( $row->pro_category == 'dryfood' && $row->pro_quantity > 0)
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('img/products/'.$row->pro_img_name.'')}}" alt="Card image cap" height="200" width="320" style="height:200px!important;">
                        <div class="card-body">
                          <h2 class="card-title">{{ $row->pro_name }}</h2>
                          <h3 class="card-text">{{ $row->pro_price }} TK</h3>
                          <h5 class="card-text">Stock: {{ $row->pro_quantity }} pc</h5>
                          <p class="card-text">{{ $row->pro_details }}</p>
                          @if (session()->has(md5('ufoodUser')))
                          <form action="{{ url('/addToCart') }}" method="POST">
                              @csrf
                              <div class="input-group mb-3">
                                  <input type="number" class="form-control" placeholder="Quantity" required name="quantity" min="1" max="{{ $row->pro_quantity }}">
                                  <input type="text" class="form-control d-none" required name="productID" value="{{ $row->id }}">
                                  <input type="text" class="form-control d-none" required name="userID" value="{{ Session::get(md5('ufoodUser'))['studentid'] }}">
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-primary d-block pt-2 ">Add to Cart</button>
                                  </div>
                              </div>
                          </form>
                          @endif
                        </div>
                      </div>
                </div>
                @endif
                @endforeach
@endif

            </div>
          </div>
        </div>
      </div>


    {{-- others --}}
    <div class="header bg-white pb-6 pt-0" id="Others">
        <div class="container-fluid">
          <h1>Others</h1>
          <p>Items available </p>
          <div class="header-body">
            <!-- Card stats -->
            <div class="row">
@if (session()->has(md5('ufoodUser')))

                @foreach ($products as $row)
                @if ( $row->pro_category == 'dryfood'  && $row->pro_quantity > 0)
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{ asset('img/products/'.$row->pro_img_name.'')}}" alt="Card image cap" height="200" width="320" style="height:200px!important;">
                        <div class="card-body">
                          <h2 class="card-title">{{ $row->pro_name }}</h2>
                          <h3 class="card-text">{{ $row->pro_price }} TK</h3>
                          <h5 class="card-text">Stock: {{ $row->pro_quantity }} pc</h5>
                          <p class="card-text">{{ $row->pro_details }}</p>
                          @if (session()->has(md5('ufoodUser')))
                          <form action="{{ url('/addToCart') }}" method="POST">
                              @csrf
                              <div class="input-group mb-3">
                                  <input type="number" class="form-control" placeholder="Quantity" required name="quantity" min="1" max="{{ $row->pro_quantity }}">
                                  <input type="text" class="form-control d-none" required name="productID" value="{{ $row->id }}">
                                  <input type="text" class="form-control d-none" required name="userID" value="{{ Session::get(md5('ufoodUser'))['studentid'] }}">
                                  <div class="input-group-append">
                                      <button type="submit" class="btn btn-primary d-block pt-2 ">Add to Cart</button>
                                  </div>
                              </div>
                          </form>
                          @endif
                        </div>
                      </div>
                </div>
                @endif
                @endforeach
@endif

            </div>
          </div>
        </div>
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


  </script>
</body>

</html>
