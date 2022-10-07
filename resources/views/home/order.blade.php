@extends('layouts.frontend')
@section('content')

        @include('home.header')

         <!-- Show all Order section -->
        <div class="order-area mt-3">
            <div class="container">
                <div class="row justify-center">
                    <div class="col-md-8">
                                <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Cancel Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                <tr>
                    <td>{{$item->product_title}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->payment_status}}</td>
                    <td>{{$item->delivery_status}}</td>
                    <td>
                        <img src="product/{{$item->image}}" alt="" class="img-fluid w-10">
                    </td>
                    <td>
                        @if ($item->delivery_status=='processing')
                            
                        <a onclick="return confirm('Are you sure to cancel this order!!!')"
                         class="btn btn-danger" href="{{url('cancel_order', $item->id)}}">Cancel Order</a>
                        
                        @else
                        <p class="text-danger">Not allowed</button>

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
                    </div>
                </div>
            </div>
        </div>
         <!-- Show all Order section -->
      </div>

        @include('home.footer')

@endsection