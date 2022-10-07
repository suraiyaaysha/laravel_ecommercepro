
@extends('layouts.frontend')
@section('content')
      <div class="hero_area">

        @include('home.header')

         <!-- Show cart data table section -->
         <div class="container">
                <div class="row justify-content-center ">
                    {{-- <div class="col-8">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                {{ session()->get('message')}}
                            </div> 
                        @endif
                    </div> --}}
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
                                <td><img src="/product/{{$item->image}}" alt="" class="w-25"></td>
                                {{-- <td><a href="{{url('remove_cart', $item->id)}}" class="btn btn-danger"
                                 onclick="return confirm('Are you sure to remove this product?')"
                                >Delete</a></td> --}}
                                <td><a href="{{url('remove_cart', $item->id)}}" class="btn btn-danger"
                                 onclick="confirmation(event)">Delete</a></td>
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

@endsection

{{-- @push('script') --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
      
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon:"warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if(willCancel) {
                window.location.href = urlToRedirect;
            }
        });
    }
</script> 
{{-- @endpush --}}