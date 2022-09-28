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

         <!-- Show cart data table section -->
         <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-8">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session()->get('message')}}
                            </div> 
                        @endif
                    </div>
                </div>

            <div class="row justify-content-center mt-5">
                <div class="col-8">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Title</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalprice=0; ?>
                            @foreach ($cart as $item)
                            <tr>
                                <td>{{$item->product_title}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                                <td><img src="/product/{{$item->image}}" alt=""></td>
                                <td><a href="{{url('remove_cart', $item->id)}}" class="btn btn-danger"
                                 onclick="return confirm('Are you sure to remove this product?')"
                                >Delete</a></td>
                            </tr>
                            <?php $totalprice=$totalprice + $item->price ?>

                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total Price: <b>${{$totalprice}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-8 mb-5">
                    <h1 class="float-left" style="font-size: 30px;">Proceed to order:</h1>
                    <a href="{{url('cash_order')}}" class="btn btn-primary float-right ml-2 d-inline">Cash on delivery</a>
                    <a href="{{url('stripe', $totalprice)}}" class="btn btn-primary float-right ml-2 d-inline">Pay using card</a>
                </div>
            </div>
         </div>
         <!-- Show cart data table section -->
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