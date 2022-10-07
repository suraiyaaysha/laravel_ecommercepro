@extends('layouts.frontend')
@section('content')

        @include('home.header')

      <!-- product section -->
        @include('home.product_view')
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

        @include('home.footer')
@endsection