
@extends('layouts.frontend')
@section('content')
      <div class="hero_area">

        @include('home.header')
         <!-- product details section -->
        <div class="row justify-content-center">
            
            <div class="col-sm-6 col-md-4 col-lg-4 my-4">
                <div class="box">
                    <div class="option_container">
                    <div class="options">
                        <h1 class="mb-3 h1">{{ $product->title }}</h1>
                        <div class="btn-box">
                           <a href="" class="option2 btn btn-primary">
                           Buy Now
                           </a>
                        </div>
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

@endsection