@if (session()->has(md5('ufoodUser')))
    @php
        $userid= Session::get(md5('ufoodUser'))['studentid'];
        $carts = DB::table('carts')->where(['user_id'=>$userid])->get();
        $carts2 = DB::table('carts')->where(['user_id'=>$userid,'quantity'=>0])->get();
        $count1 = $carts->count();
        $count2 = $carts2->count();
        $count = $count1 - $count2;
    @endphp
@endif
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
          <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </form>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-sm-none pr-7">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          <li class="nav-item d-xl-none pl-9">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>

          @if (session()->has(md5('ufoodUser')))

          <li class="nav-item dropdown">
            <a class="nav-link d-flex text-light font-weight-bold my-auto ml-2 mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <h6>
                  <i style="font-size: 1.4rem;" class="fas fa-shopping-cart"></i>
                  <span style="font-size: 0.8rem;" class="badge badge-pill badge-dark text-white">{{ $count }}</span>
                </h6>
            </a>
@if ($count > 0)


            <div class="  dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              <!-- Dropdown header -->
              <div class="px-3 py-3">
                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{ $count }}</strong> Items in the cart</h6>
              </div>
              <!-- List group -->
@foreach ($carts as $item)
@if ($item->quantity > 0)


@php
$products = DB::table('products')->where(['id'=>$item->product_id])->first();

$totalPrice = $item->quantity*$products->pro_price;

@endphp
              <div class="row container border border-top-0 border-left-0 border-right-0 border-dark mx-auto mb-3 pb-3">
                <div class="col-auto">
                  <img alt="Image placeholder" src="{{ asset('img/products/'.$products->pro_img_name) }}" class="avatar rounded-circle img-fluid">
                </div>
                <div class="col">
                    <p class="mb-0">{{ $products->pro_name }}</p>
                    <span>{{ $item->quantity }} x {{ $products->pro_price }} tk = {{ $totalPrice }} tk</span>
                </div>
                <div class="col-auto">
                  <a href="{{ url('/removeFromCart?pID='.$products->id) }}">Remove</a>
                </div>
              </div>
@endif
@endforeach
              <!-- View all -->
              <a href="{{ url('/createOrder') }}" class="dropdown-item text-center text-primary font-weight-bold py-3">Proceed to order.</a>
            </div>
@endif
          </li>
          @endif

        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            @if (session()->has(md5('ufoodUser')))
            <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
@php
    $usr = DB::table('users')->where(['studentid'=>$userid])->first();
@endphp
                  <img alt="Image placeholder" src="{{ asset('img/user/picture/'.$usr->profilePic ) }}">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Session::get(md5('ufoodUser'))['name'] }}</span>

                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <div class="dropdown-header">
                @if (session()->has(md5('ufoodUser')))
                  @php
                      $userid= Session::get(md5('ufoodUser'))['studentid'];
                      $user_account = DB::table('user_account')->where(['user_id'=>$userid])->first();
                  @endphp
                @endif
                  @if (session()->has(md5('ufoodUser')))
                        <h5 class="text-overflow m-0 text-danger">Balance - {{ $user_account->current_money }} tk</h6>
                  @else
                        <h5 class="text-overflow m-0 text-danger">Balance - 0 tk</h6>
                  @endif



              </div>
              <a href="{{ url('/profile') }}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="{{ url('/orders') }}" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>My Orders</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ url('/logout') }}" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
          @endif
          @if (!session()->has(md5('ufoodUser')))
          <li class="nav-item ">
            <a class="nav-link font-weight-bold" href="{{ url('/login') }}" >Login</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
