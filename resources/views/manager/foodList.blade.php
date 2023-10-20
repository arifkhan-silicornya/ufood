
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
                  <li class="breadcrumb-item"><a href="#">Food Item List</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">

            <form action="">

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-planet "></i></span>
                    </div>
                    <select class="form-control" id="">
                      <option>Select Item Category to Filter...</option>
                      <option>All</option>
                      <option>Breakfast</option>
                      <option>Lunch</option>
                      <option>Dry Food</option>
                      <option>Drinks</option>
                      <option>Others</option>
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        @if(session()->has('error'))
        <div class="alert alert-block {{session('alert')}}">
            <button type="button" class="close ml-2 mr-0" data-dismiss="alert">×</button>
            <strong>{{ session('error') }}</strong>
        </div>
        @endif
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
                          <th scope="col" class="sort">Serial</th>
                          <th scope="col" class="sort">Product Name</th>
                          <th scope="col" class="sort">Product Details</th>
                          <th scope="col" class="sort">Image</th>
                          <th scope="col" class="sort">Price</th>
                          <th scope="col" class="sort">Category</th>
                          <th scope="col" class="sort">Institute Name</th>
                          <th scope="col" class="sort">Update Stock</th>
                          <th scope="col" class="sort">Date</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @foreach ($products as $row)

                        <tr>
                          <td class="budget">
                            {{ $row->id }}
                          </td>
                          <td class="budget">
                            {{ $row->pro_name }}
                          </td>
                          <td class="budget">
                            {{ $row->pro_details }}
                          </td>
                          <td class="budget">
                            <img src="{{ asset('img/products/'.$row->pro_img_name.'')}}" alt="image" class="img-thumbnail img-fluid" style="width: 70px!important;">
                          </td>
                          <td class="budget">
                            {{ $row->pro_price }} ZL
                          </td>
                          <td class="budget">
                            {{ $row->pro_category }}
                          </td>
                          <td class="budget">
                            {{ $row->instituteCode }}
                          </td>
                          <td class="budget">
                            <form action="{{ url('/managerStockUpdate') }}" method="post">
                                @csrf
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <input type="number" min="0" class="form-control d-none" name="foodID" value="{{ $row->id }}" placeholder="food Id" required readonly>
                                        <input type="number" min="0" class="form-control" name="stock" value="{{ $row->pro_quantity }}" placeholder="Quantity" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="button-addon2">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="completion mr-2">2021-02-16</span>
                            </div>
                          </td>
                          <td class="text-right">
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">Report</a>
                                <a class="dropdown-item" href="#">Edit</a>
                              </div>
                            </div>
                          </td>
                        </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>

            <div class="card-footer py-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>



          </div>
        </div>
      </div>
      <!-- Footer -->
      {{ View::make('manager.footer') }}
    </div>
  </div>

</body>

</html>
