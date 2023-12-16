<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
         <!-- end slider section -->
         <div>
         <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="/product/{{ $product->image }}" alt="" class="img-fluid">
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <h3>{{ $product->title }}</h3>
            </div>
            @if($product->discount!=null)
            <div class="mb-3">
                <h1 class="text-danger">{{ $product->discount }}$</h1>
            </div>
            <div class="mb-3" style="text-decoration: line-through;">
                <h4>{{ $product->price }}$</h4>
            </div>
            <div class="mb-3" >

                <h4>Sales end in :<span style="color:red;">10h</span></h4>
            </div>
            @else
            <div class="mb-3">
                <h1 class="text-primary">{{ $product->price }}$</h1>
            </div>
            @endif
            <div class="mb-3">
                <label for="">Size: </label>
                <select name="size" id="">
                    <option value="xs "></option>
                    <option value="x"></option>
                    <option value="m"></option>
                    <option value="l"></option>
                    <option value="xl"></option>
                    <option value="xxl"></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Quantity: </label>
                <input type="number" name="" id="" min="1" max="10">
            </div>
            <h6>Description: {{$product->description}}</h6>
            <h6>Category: {{$product->category}}</h6>
            <h6>Available: {{$product->quantity}}</h6>
            <div class="mb-3">
            <form action="{{url('add_cart',$product->id)}}" method="post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    
                                    <input type="number" name="quantity" id="" value="1">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add to Cart">

                                 </div>


                              </div>
                           </form>
            </div>
        </div>
    </div>
</div>

      </div>
      <!-- why section -->
      <!-- end client section -->
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