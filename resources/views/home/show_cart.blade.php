<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <div class="container mt-4">
    <h2>

        Your Cart
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
           <?php $total_price=0; ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td><img src="/product/{{$cart->image}}" alt="Product Image" style="max-width: 50px;"></td>
                <td>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="{{url('/remove_cart',$cart->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php 
            $total_price = $total_price + $cart->price;
            ?>
            @endforeach
            <!-- Add more rows as needed -->
            <tr>
                <td></td>
                <td>Total to Pay</td>
                <td>{{$total_price}}</td>
                <td>       <a href="{{url('/order_details')}}" class="btn btn-warning">Cash on Delivery</a></td>
                <td>       <a href="{{url('/order_details')}}" class="btn btn-primary">Card Payment</a></td>
              
            </tr>
        </tbody>
    </table>

</div>
      </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>