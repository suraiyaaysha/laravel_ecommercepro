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
            width: 50%;
            border: 1px solid;
            margin: 32px auto;
        }

        tr {
            border: 1px solid white;
        }

        td {
            padding: 17px;
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
            <div class="main-panel">
                <div class="content-wrapper text-center">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message')}}
                        </div> 
                        @endif
                        
                        <div class="mb-4">
                            <h1 class="font-30 text-center">Add Product</h2>
                        </div>

                        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Product Title:</label>
                                <input type="text" name="product_title" placeholder="Title here" required>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <input type="text" name="description" placeholder="description here" required>
                            </div>
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" name="image" placeholder="Image here" required>
                            </div>
                            <div class="form-group">
                                <label>Product Category:</label>
                                <select name="product_category" required>
                                    <option selected>Add a category here</option>
                                    @foreach ($category as $item)
                                    <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="number" name="price" placeholder="price here" required>
                            </div>
                            <div class="form-group">
                                <label>Discount Price:</label>
                                <input type="number" name="discount_price" placeholder="discount_price here">
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" min="0" name="quantity" placeholder="quantity here" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add Product">
                            </div>
                        </form>
                </div>

            </div>
        <!-- partial -->

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>