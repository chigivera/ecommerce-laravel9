<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Product Details
                           </a>
                           <form action="{{url('add_cart',$products->id)}}" method="post">
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
                     <div class="img-box">
                        <img src="/product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                        @if($products->discount!=null)
                        
                           <h6 style="text-decoration:line-through;">
                           {{$products->price}}$
                           </h6>
                           <h6 style="color:red;">
                           {{$products->discount}}$
                           </h6>
                        
                        @else
                        

                           <h6>
                           {{$products->price}}$
                           </h6>
                        
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
               <div style="display:flex;justify-content:center;
               width:100%">

                  {!!$product->appends(Request::all())->links()!!}
               </div>
                           <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>