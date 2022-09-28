<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
        <style>
        .font-30{
            font-size: 30px;
        }

        table.text-center {
            width: 100%;
            border: 1px solid;
            margin: 32px auto;
        }

        tr {
            border: 1px solid white;
        }

        td {
            padding: 17px;
        }
        td>img {
            height: 100px;
            max-width: 100px;
        }
    </style>
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
         
         <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 text-center">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button class="close" type="button" data-dismiss="alert" area-hidden="true">x</button>
                                {{session()->get('message')}}
                            </div>
                        @endif

                        <div class="mb-4">
                            <h1 class="font-30">Product List</h2>
                        </div>
                        
                        <table>
                            <thead>
                                <tr>
                                    <th>Product title</th>
                                    <th>Description</th>
                                    <th>Product Image</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>discount Price</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            {{-- {{ $item->image }} --}}
                                            <img src="/product/{{ $item->image }}" alt="">
                                        </td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->discount_price }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to delete this!')"
                                             href="{{url('delete_product', $item->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{url('update_product', $item->id)}}" class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>