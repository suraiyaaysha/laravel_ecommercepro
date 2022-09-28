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
      <link rel="shortcut icon" href="images/favicon.png" type="">
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

        <!-- product details section -->
        <div class="row justify-content-center">
            
            <div class="col-sm-6 col-md-4 col-lg-4 my-4">
                <div class="box">
                    <div class="option_container">
                    <div class="options">
                        <h1 class="mb-3">{{ $product->title }}</h1>
                        <a href="" class="option2">
                        Buy Now
                        </a>
                    </div>
                    </div>
                    <div class="img-box py-4">
                        <img src="/product/{{ $product->image }}" alt="" class="img-fluid">
                    </div>
                    <div class="detail-box">
                        <h5>{{ $product->title }}</h5>
                        @if ($product->discount_price!=null)
                            <h6 style="color:darkblue">${{ $product->discount_price }}</h6>
                            <h6 style="text-decoration: line-through; color:red;">${{ $product->price }}</h6>
                            @else
                            <h6 style="color:darkblue">${{ $product->price }}</h6>
                        @endif
                        
                        <div><strong>Category:</strong> {{ $product->category }}</div>
                        <div><strong>Description:</strong> {{ $product->description }}</div>
                        <div><strong>Quantity:</strong> {{ $product->quantity }}</div>

                        {{-- <a href="" class="btn btn-primary mt-4">Add to Cart</a> --}}
                        <form action="{{url('add_cart', $product->id)}}" method="POST">
                           @csrf
                              <div class="row">
                                 <div class="col">
                                    <input type="number" name="quantity" value="1" min="1">
                                 </div>
                                 <div class="col">
                                    <input type="submit" value="Add to Cart">
                                 </div>
                              </div>
                           </form>

                    </div>
                </div>
            </div>
        </div>
         <!-- product details section -->

      </div>

        @include('home.footer')

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