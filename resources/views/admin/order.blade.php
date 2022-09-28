<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
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

        <!-- Admin Order Design -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-4">All Order</h1>
                        <div class="table-responsive">
                          <table class="table bg-gradient-light text-black">
                              <thead class="text-black font-bold">
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
                                      <th>Delivered</th>
                                      <th>Print PDF</th>
                                      <th>Send Email</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($order as $item)
                                  <tr>
                                      <td>{{$item->name}}</th>
                                      <td>{{$item->email}}</td>
                                      <td>{{$item->address}}</td>
                                      <td>{{$item->phone}}</td>
                                      <td>{{$item->product_title}}</th>
                                      <td>{{$item->quantity}}</td>
                                      <td>{{$item->price}}</td>
                                      <td>{{$item->payment_status}}</td>
                                      <td>{{$item->delivery_status}}</td>
                                      <td>
                                        <img src="/product/{{$item->image}}" alt="" class="img-fluid">
                                      </td>
                                      <td>
                                        @if ($item->delivery_status=='processing')
                                          <a href="{{url('delivered', $item->id)}}"
                                          onclick="return confirm('Are you sure to make this product is Delivered!')"
                                          class="btn btn-primary">Delivered
                                          </a>
                                          @else
                                            <p class="text-success">Delivered</p>
                                        @endif
                                      </td>

                                      <td><a href="{{url('print_pdf', $item->id)}}" class="btn btn-secondary">Print PDF</a></td>
                                      <td><a href="{{url('send_email', $item->id)}}" class="btn btn-info">Send Email</a></td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Admin Order Design -->

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>