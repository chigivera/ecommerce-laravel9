<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
        .product-form {
    display: flex;
    flex-direction: column;
    max-width: 400px; /* Adjust the maximum width of the form */
    margin: auto; /* Center the form on the page */
}

.form-group {
    display:flex;
    margin-bottom: 15px;
    flex-direction: row;
}

label {
    display: block;
    margin-bottom: 5px;
}

input,
select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
           
            <table class="table">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product description</th>
                <th scope="col">Product image</th>
                <th scope="col">Product category</th>
                <th scope="col">Product quantity</th>
                <th scope="col">Product price</th>
                <th scope="col">Product discount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Your category data goes here -->
           @foreach($product as $data)
            <tr>
                <td><img src="/product/{{ $data->image }}" alt="product"> </td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->description }}</td>
                <td>{{ $data->category }}</td>
                <td>{{ $data->quantity }}</td>
                <td>{{ $data->price }}</td>
                <td>{{ $data->discount }}</td>
                <td>
                    <!-- Add your action buttons or links here -->
                      <a href="{{url('delete_product',$data->id)}}" type="button" class="btn btn-danger">Delete</a>
                      <a href="{{url('update_product',$data->id)}}" type="button" class="btn btn-primary">Update</a>
                </td>
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table> 
            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>