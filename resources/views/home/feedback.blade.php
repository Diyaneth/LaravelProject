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
   <body class="sub_page">
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <div class="heading_container heading_center">
               <h2 style="font-size:70px;"><br>
                  Give <span>Feedback</span>
               </h2>
               <br><br>
</div><br>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="{{url('send_feedback')}}" method="POST">
                        @csrf
                        <fieldset>
                           <input type="text" placeholder="Enter your full name" name="name" required />
                           
                           <textarea placeholder="Enter your feedback" name="feedback" required></textarea>
                           <input type="submit" name="submit" value="Send feedback" />
                           
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
        </div>
      </section>

      <div>
        
      <div class="heading_container heading_center">
               <h2 style="font-size:40px;">
                  All <span>feedbacks</span>
               </h2>
               <br><br>
</div><br>
         @foreach($feedback as $feedbacks)
         
         <div style="padding-left:20%;">
                  <b style="font-size:20px; color:teal;">{{$feedbacks->F_name}}</b>
            <p style="font-size:20px;">{{$feedbacks->F_feedback}}</p><br>
                  </div>
           
         
        @endforeach
        <span style="padding-top: 20px;">

               {!!$feedback->withQueryString()->links('pagination::bootstrap-5')!!}

               </span>
        </div>
        
      <!-- end why section -->
      <!-- arrival section -->
      
      <!-- end arrival section -->
      <!-- footer section -->
      <footer class="footer_section">
         <div class="container">
            <div class="row">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Reach at..
                     </h4>
                     <div class="contact_link_box">
                        <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Bandarawela
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Call +94 1234567890
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        cyberstore@gmail.com
                        </span>
                        demo@gmail.com
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.html" class="footer-logo">
                     Cyber Store
                     </a>
                     <p>
                     The Best Online Shopping Experience in Sri Lanka with Islandwide Free/ Express/ Cash On Delivery.
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>