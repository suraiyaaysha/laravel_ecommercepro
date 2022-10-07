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
                            <h1 class="font-30">Add Category</h2>
                        </div>

                        <form action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <input type="text" name="category" class="text-gray-700" placeholder="write category name...">
                            <input type="submit" class="btn btn-primary bg-primary p-2" name="submit" value="Add Category">
                        </form>

                        <table class="text-center">
                          <thead>
                            <tr>
                              <td>Category Name</td>
                              <td>Action</td>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($data as $item)
                              <tr>
                                <td>{{$item->category_name}}</td>
                                <td>
                                  <a onclick="return confirm('Are you sure to delete?')" href="{{ url('delete_category', $item->id) }}" class="btn btn-danger">Delete</a>
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