<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print PDF</title>
</head>
<body>
    <h1>Your Order Details</h1>
   <table style="max-width:100%; border:1px solid black">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$order->name}}</th>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</th>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img src="product/{{$order->image}}" alt="Why no Image" height="80px" width="80px">
                </td>
        </tbody>
    </table> 

                {{-- <div>Name:{{$order->name}}</div>
                <div>Email: {{$order->email}}</div>
                <div>Address: {{$order->address}}</div>
                <div>Phone: {{$order->phone}}</div>
                <div>Product Title: {{$order->product_title}}</div>
                <div>Quantity: {{$order->quantity}}</div>
                <div>Price: {{$order->price}}</div>
                <div>Payment Status: {{$order->payment_status}}</div>
                <div>Delivery Status: {{$order->delivery_status}}</div>
                <br><br> 
                    <img src="product/{{$order->image}}" alt="Why no Image" height="200px" width="200px"> --}}
</body>
</html>