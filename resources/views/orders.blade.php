@php

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


    <!-- Header -->
    <div class="header py-0 my-0  d-flex align-items-center" >
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->

    </div>
    <!-- Page content -->
    <div class="container-fluid mt-3">
      <div class="row">

        <div class="col-md-4 float-left">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-md-12">
                  <h4 class="mb-0 text-justify">Your Orders </h4>
                </div>
                <div class="col-md-12 text-center ">
                  <a href="{{ url('/orders?status=all') }}" class="btn btn-sm btn-primary">All</a>
                  <div class="btn-group ">
                    <a href="{{ url('/orders?status=pending') }}" class="btn btn-sm btn-primary mr-1">Pending</a>
                    <a href="{{ url('/orders?status=processing') }}" class="btn btn-sm btn-primary mr-1">Processing</a>
                    <a href="{{ url('/orders?status=delivered') }}" class="btn btn-sm btn-primary mr-1">Delivered</a>
                    <a href="{{ url('/orders?status=cancel') }}" class="btn btn-sm btn-primary">Canceled</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">

            <div>
                <table class="table align-items-center">

                    <tbody class="list">
                    @foreach ($orders as $row)
                    @php
                        $status = 'pending';
                        $users = DB::table('users')->where(['studentid'=>$row->customer_id])->first();
                    @endphp


                            <tr>
                        <td class="budget">
                            <a href="{{ url('/orders?orderId='.$row->id) }}" >  Invoice No. :  #{{ $row->id }}</a>
                        <div class="completion mr-2"><a href="{{ url('/orders?orderId='.$row->id) }}" >  {{ $row->created_at }}</a></div>
                        </td>
                        <td>Total Price - {{ $row->total_Price }}</td>
                        <td>
                            <a href="{{ url('/orders?orderId='.$row->id) }}" >
                        <span class="badge badge-dot mr-4">
                            <span class="status text-capitalize">{{ $row->status }}</span>
                        </span>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
                <div class="card-footer py-4">
                    {{$orders->links('pagination::bootstrap-4')}}
                </div>

            </div>

          </div>
        </div>

        {{-- order details start --}}
@php
    $count= 0 ;
@endphp
@foreach ($orders as $row)
@php

    $orders_details = DB::table('orders_details')->where(['order_id'=>$row->id])->get();
@endphp
@if ($count == 0)

        <div class="col-md-8 ">
            <div class="card p-3 table-responsive">
                <table class="table align-items-center ">
                    <thead>
                        <tr class="d-flex justify-content-between">
                            <td>
                                <h3>Invoice No. #{{ $row->id }}</h3>
                                <h5 class="text-muted">Date :{{ $row->created_at }}</h5>
                            </td>
                            <td>
                                @if ($row->status == 'pending')
                                    <a href="{{ url('/orderCancel?id='.$row->id) }}" class="btn btn-outline-dark">Cancel Order</a>
                                @else
                                    <a href="#" class="btn btn-outline-dark disabled" onclick="return alert('Only pending order can be cancel') ">Cancel Order</a>
                                @endif
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>

            <h2>Product Description</h2>

            <div class="card p-3 table-responsive">
                <table class="table align-items-center ">
                    <thead>
                        <tr>
                            <td>Description</td>
                            <td>Quantity</td>
                            <td>Amount</td>
                        </tr>
                    </thead>

@foreach ($orders_details as $details)
@php

    $products = DB::table('products')->where(['id'=>$details->item_id])->first();
@endphp
                    <tbody>
                        <tr>
                            <td class="d-flex justify-content-between">
                                <img src="{{ asset('img/products/'.$products->pro_img_name)}}" alt="image" height="40" width="40" style="height:40px!important;">
                                <span>{{ $products->pro_name }} : - {{ $products->pro_details }}</span>
                            </td>
                            <td>{{ $details->quantity }} x {{ $details->price }} tk</td>
                            <td>{{ $details->total_price }} tk</td>
                        </tr>
                    </tbody>
@endforeach
                </table>
            </div>

            <div class="card p-3 table-responsive">
                <table class="table align-items-center ">
                    <thead>
                        <tr class="d-flex justify-content-between">
                            <td>Status : <button class="btn btn-danger btn-sm text-capitalize">{{ $row->status }}</button></td>
                            @if ($row->status == 'pending')
                                <td> <span class="font-weight-bold ">Total Price : {{ $row->total_Price }} tk</span>  <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-outline-danger ml-3">Make Payment</button></td>
                            @elseif ($row->status == 'processing')
                                <td> <span class="font-weight-bold ">Total Price : {{ $row->total_Price }} tk</span>  <a href="{{ url('/markDelivered?orderID='.$row->id) }}" class="btn btn-outline-success ml-3">Mark as Delivered</a></td>
                            @else
                                <td> <span class="font-weight-bold ">Total Price : {{ $row->total_Price }} tk</span>  </td>
                            @endif


                        </tr>
                    </thead>
                </table>
            </div>

        </div>
@php
    $count ++ ;
@endphp

 {{-- payment  start --}}
@php
    $userid= Session::get(md5('ufoodUser'))['studentid'];
    $user_account = DB::table('user_account')->where(['user_id'=>$userid])->first();
@endphp
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/paymentConfirm') }}" method="post">
            @csrf
            <input type="number" name="order_id" value="{{ $row->id }}" required readonly class="d-none">
            <input type="number" name="totalPrice" value="{{ $row->total_Price }}" required readonly class="d-none">
            <h2>Please Choose your preferred method</h2>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="cash" checked>
                <label class="form-check-label" for="exampleRadios1">
                  Cash on delivery
                </label>
              </div>
@if ($user_account->current_money >= $row->total_Price)


              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="balance">
                <label class="form-check-label" for="exampleRadios2">
                  Balance Payment
                </label>
              </div>
@else
              <div class="text-danger">Balance Low</div>
@endif
                <div class="modal-footer">
                    <button type="cancel" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </form>
        </div>

      </div>
    </div>
  </div>
{{-- payment end --}}

@endif
@endforeach

      </div>
      <!-- Footer -->
      {{ View::make('footer') }}
    </div>
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
