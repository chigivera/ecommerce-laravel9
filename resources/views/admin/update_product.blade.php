<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
            <div class=" text-center pt-4">
                <h2>Update Product</h2>
                <form class='product-form' action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="ProductName">Product Title</label>
        <input type="text" class="form-control" id="ProductName" name="title" value="{{$product->title}}">
    </div>

    <div class="form-group">
        <label for="ProductDescription">Product Description</label>
        <input type="text" class="form-control" id="ProductDescription" name="description" value="{{$product->description}}">
    </div>

    <div class="form-group">
        <label for="ProductImage">Product Image</label>
        <input type="file" class="form-control" id="ProductImage" name="image" >
    </div>
    <div class="form-group">
        <h2>Current image</h2>
        <img src="/product/{{$product->image}}" alt="">
    </div>

    <div class="form-group">
        <label for="CategoryName">Category Name</label>
        <select name="category_id" id="CategoryName" class='form-control'>
            <option value="" selected>{{$product->category }}</option>
            @foreach($category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="ProductQuantity">Product Quantity</label>
        <input type="text" class="form-control" id="ProductQuantity" name="quantity" value="{{$product->quantity}}">
    </div>

    <div class="form-group">
        <label for="ProductPrice">Product Price</label>
        <input type="text" class="form-control" id="ProductPrice" name="price" value="{{$product->price}}">
    </div>

    <div class="form-group">
        <label for="ProductDiscount">Product Discount</label>
        <input type="text" class="form-control" id="ProductDiscount" name="discount" value="{{$product->discount}}">
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>


            </div>
            
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