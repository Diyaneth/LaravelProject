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
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Cyber Store</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('/home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
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

      <!--comment and reply system start-->
      <div class="heading_container heading_center">
               <h2 style="font-size:40px;">
                  Add <span>Comment</span>
               </h2>
               <br><br>
</div><br>
      <div style="text-align:center; padding-bottom:30px;">
         

         <form action="{{url('add_comment')}}" method="POST">
         @csrf
            <textarea style="height:150px; width:600px;" placeholder="Comment Something Here" name="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="Comment">
         </form>
      </div>

      <div class="heading_container heading_center">
               <h2 style="font-size:30px;">
                  All <span>Comments</span>
               </h2>
               <br><br>
</div><br>
      <div style="padding-left:20%;">
         

         @foreach($comment as $comment)
         <div>
            <b style="font-size:20px; color:teal;">{{$comment->name}}</b>
            <p style="font-size:20px;">{{$comment->comment}}</p>
            <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

            @foreach($reply as $reply1)

            @if($reply1->comment_id==$comment->id)

         <div style="padding-left:3%; padding-bottom:10px;">
            <b style="font-size:20px; color:teal;">{{$reply1->name}}</b>
            <p style="font-size:20px;">{{$reply1->reply}}</p>
            <a style="color:blue;" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

         </div>
         @endif

         @endforeach

         </div>

         @endforeach

         <div style="display:none;" class="replyDiv">

         <form action="{{url('add_reply')}}" method="POST">
            @csrf

            <input type="text" hidden="" id="commentId" name="commentId">
            <textarea style="height:100px; width:500px;" name="reply" placeholder="Write something here"></textarea>
            <br>
               <button type="submit" class="btn btn-warning">Reply</button>
            <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>

         </form>
         </div>

      </div>

      

      <!--comment and reply system end-->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved<br>
         
            
         
         </p>
      </div>

      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }

         function reply_close(caller)
         {
            
            $('.replyDiv').hide();
         }

      </script>

<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

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