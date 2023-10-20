@php
    $users = DB::table('users')->get();
    $user_account = DB::table('user_account')->get();
@endphp
@foreach ($users as $item)
@if (Session::get(md5('ufoodUser'))['studentid']  == $item->studentid  )

@php
    $ordersTotal = DB::table('orders')->where(['customer_id'=>$item->studentid])->count();
    $ordersPending = DB::table('orders')->where(['customer_id'=>$item->studentid,'status'=>'pending'])->count();
    $ordersProcessing = DB::table('orders')->where(['customer_id'=>$item->studentid,'status'=>'processing'])->count();
    $ordersDelivered = DB::table('orders')->where(['customer_id'=>$item->studentid,'status'=>'delivered'])->count();
    $ordersCancel = DB::table('orders')->where(['customer_id'=>$item->studentid,'status'=>'cancel'])->count();
@endphp

<div class="col-xl-3 order-xl-2">
    <div class="card card-profile">
      <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="{{ asset('img/user/picture/'.$item->profilePic) }}" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-center">
          <div class="d-flex justify-content-center pt-md-6 pt-sm-3 flex-column align-content-center">
            <div class="row mb-2">
              <a href="{{ url('/') }}" class="btn btn-sm btn-info">Menu</a>
              <a href="{{ url('/profile') }}" class="btn btn-sm btn-info">Profile</a>
              <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">Set Image</a>
            </div>
            <div class="row">
              <a href="{{ url('/orders') }}" class="btn btn-sm btn-default float-right">Orders</a>
              <a href="{{ url('/transactions') }}" class="btn btn-sm btn-default float-right">Transactions</a>
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
              <form action="{{ url('/userpictureUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="modal-body">
                    <input type="email" name="email" value="{{ $item->email }}" class="d-none">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input d-block" name="profilePicture" required>
                      <label class="custom-file-label" ></label>
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
              <form action="{{ url('/userPassChange') }}" method="POST">
                    @csrf
                  <div class="modal-body">


                  <input type="email" class="form-control d-none" name="email" value="{{Session::get(md5('ufoodUser'))['email']}}">

                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Old</span>
                          </div>
                          <input type="text" class="form-control" name="oldPass" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">New</span>
                          </div>
                          <input type="text" class="form-control" name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroup-sizing-sm">Confirm New</span>
                          </div>
                          <input type="text" class="form-control" name="RetypePass" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                      </div>
                  </div>

                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body pt-0 mb-1">
        <div class="row">
          <div class="col mb-7">
            <div class="card-profile-stats d-flex justify-content-center">
              <div>
                <span class="heading">{{ $ordersTotal }}</span>
                <span class="description">Total Orders</span>
              </div>
              <div>
                <span class="heading">{{ $ordersPending }}</span>
                <span class="description">pending Orders</span>
              </div>
              <div>
                <span class="heading">{{ $ordersProcessing }}</span>
                <span class="description">processing Orders</span>
              </div>
            </div>
            <div class="card-profile-stats d-flex justify-content-center">
              <div>
                <span class="heading">{{ $ordersDelivered }}</span>
                <span class="description">Delivered Orders</span>
              </div>
              <div>
                <span class="heading">{{ $ordersCancel }}</span>
                <span class="description">Canceled Orders</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <h5 class="h3">
            {{ Session::get(md5('ufoodUser'))['name'] }}<span class="font-weight-light"></span>
          </h5>
          <div class="h5 font-weight-300">
            <i class="ni location_pin mr-2"></i>Dhaka, Bangladesh
          </div>
          <div class="d-none">
            <i class="ni education_hat mr-2 "></i>City University of Bangladesh
          </div>
        </div>
      </div>
    </div>
  </div>

  @endif
  @endforeach
