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
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Item</li>
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
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header text-center border-bottom-0">
              <h4 class="card-title">Update Item</h4>
              <p class="card-category">Selected Name: Shingara</p>
            </div>
            <div class="card-body">

              <form role="form">
                <div class="form-group">
                  <img src="assets/img/theme/react.jpg" alt="..." class="img-thumbnail">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlFile1">Set Food Image - Supported Formats: jpg, png</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Product Name" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-planet"></i></span>
                    </div>
                    <input class="form-control" placeholder="Item Quantity" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                    </div>
                    <input class="form-control" placeholder="Item Price" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-planet "></i></span>
                    </div>
                    <select class="form-control" id="">
                      <option>Select Item Category ...</option>
                      <option>Breakfast</option>
                      <option>Lunch</option>
                      <option>Dry Food</option>
                      <option>Drinks</option>
                      <option>Others</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                  <textarea class="form-control" name="" id="" rows="3" placeholder="Details"></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-primary mt-4">Create New Item</button>
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
</body>

</html>
