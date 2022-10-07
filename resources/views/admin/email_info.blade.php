<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
    <style>
        label{
            display: inline-flex;
            width: 200px;
            font-weight: bold;
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

        <!-- Admin Order Design -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="h2">Send email to {{$order->email}}</h1>
                        <form action="{{url('send_user_email', $order->id)}}" method="POST">
                            @csrf
                            
                        <div class="mb-2">
                            <label> Email Greeting:</label>
                            <input type="text" name="greeting">
                        </div>
                        <div class="mb-2">
                            <label>Email Firstline:</label>
                            <input type="text" name="firstline">
                        </div>
                        <div class="mb-2">
                            <label>Email Body:</label>
                            <input type="text" name="body">
                        </div>
                        <div class="mb-2">
                            <label>Email Button Name:</label>
                            <input type="text" name="button">
                        </div>
                        <div class="mb-2">
                            <label>Email url:</label>
                            <input type="text" name="url">
                        </div>
                        <div class="mb-2">
                            <label>Email last line:</label>
                            <input type="text" name="lastline">
                        </div>
                        <div>
                            <input type="submit" value="Send Email" class="btn btn-primary">
                        </div>
                        </form>
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