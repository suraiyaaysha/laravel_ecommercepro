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
      
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
   </head>
   <body>
      <div class="hero_area">

        @include('home.header')

         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>

      <!-- why section -->
        @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
        @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
        @include('home.product')
      <!-- end product section -->


      <!-- Comment and Reply System Start -->
      <div class="container comment-reply-section mb-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <h1 class="h2">Comments:</h1>
            <form action="{{url('add_comment')}}" method="POST">
              @csrf
              <textarea name="comment" id="" cols="30" rows="5"></textarea>
              <button type="submit" class="btn btn-primary bg-primary">Submit comment</a>
            </form>
          </div>
        </div>
      </div>

    <!-- Reply comments area -->
    <div class="reply-comments mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="h2">All Comments</div>

            @foreach ($comment as $item)
            <div class="comment-item border p-3 mb-3">
              <div class="h5">{{$item->name}}</div>
              <p>{{$item->comment}}</p>
              <button class="btn btn-primary btn-sm mt-2" onclick="reply(this)" data-comment-id="{{$item->id}}">Reply</a>
            </div>

            {{-- Inside Replies --}}
            @foreach ($reply as $data)
              @if ($data->comment_id==$item->id)
                <div class="comment-item border p-3 mb-3 ml-5">
                  <div class="h5">{{$data->name}}</div>
                  <p>{{$data->reply}}</p>
                  <button class="btn btn-primary btn-sm mt-2" onclick="reply(this)" data-comment-id="{{$item->id}}">Reply</a>
                </div>
              @endif
            @endforeach
            {{-- Inside Replies --}}

            @endforeach

            <!-- show-reply-form area -->
            <div style="display: none" class="show-reply-form mt-2" id="replyDiv">
              <form action="{{url('add_reply')}}" method="POST">
                  @csrf
                  <input type="text" id="commentId" name="commentId" hidden>
                  <textarea name="reply" id="" cols="30" rows="2" placeholder="Write something here"></textarea><br>
                  <button type="submit" class="btn btn-primary bg-primary btn-sm mr-2">Submit reply</a>
                  <button type="button" class="btn btn-danger bg-danger btn-sm" onclick="reply_close(this)">Close</a>
              </form>
            </div>
            <!-- show-reply-form area -->
          </div>
        </div>
      </div>
    </div>
    <!-- Reply comments area -->

      
      <script type="text/javascript">
        function reply(caller) {
          document.getElementById('commentId').value=$(caller).attr('data-comment-id');
          $('#replyDiv').insertAfter($(caller));
          $('#replyDiv').show();
        };

        function reply_close(caller) {
          $('#replyDiv').hide();
        }
      </script>
      <!-- Comment and Reply System End -->

      {{-- refresh page and keep scroll postion --}}
       <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
      {{-- refresh page and keep scroll postion --}}


      <!-- subscribe section -->
        @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client section -->
        @include('home.client')
      <!-- end client section -->

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