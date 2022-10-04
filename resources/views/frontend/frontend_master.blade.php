<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="MediaCenter, Template, eCommerce">
      <meta name="robots" content="all">
      <title>Shopping Cart | Ecommerce Food Delivery</title>
      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
      <!-- Customizable CSS -->
      <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/blue.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.transitions.cs')}}s">
      <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/rateit.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css')}}">
      <!-- Icons/Glyphs -->
      <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css')}}">
      <!-- Fonts --> 
      <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   </head>
   <body class="cnt-home">
      <!-- ============================================== HEADER ============================================== -->
      <header class="header-style-1">
         <!-- ============================================== TOP MENU ============================================== -->
         @include("frontend.partials.header_top")
         <!-- ============================================== TOP MENU : END ============================================== -->
         @include("frontend.partials.header_bottom")
         <!-- ============================================== NAVBAR ============================================== -->
         @include("frontend.partials.navbar")
         <!-- ============================================== NAVBAR : END ============================================== -->
      </header>
      <!-- ============================================== HEADER : END ============================================== -->
      <div class="body-content outer-top-xs" id="top-banner-and-menu">
         <div class="container">
            <div class="row">

              {{-- sidebar here --}}
               
               <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                 
                 
                @yield("front_content")
                  <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
               </div>
               <!-- /.homebanner-holder -->
               <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
               <div class="logo-slider-inner">
                  <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                     <div class="item m-t-15">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item m-t-10">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                     <div class="item">
                        <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                        </a>	
                     </div>
                     <!--/.item-->
                  </div>
                  <!-- /.owl-carousel #logo-slider -->
               </div>
               <!-- /.logo-slider-inner -->
            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
         </div>
         <!-- /.container -->
      </div>
      <!-- /#top-banner-and-menu -->
      <!-- ============================================================= FOOTER ============================================================= -->
      @include("frontend.partials.footer")
      <!-- ============================================================= FOOTER : END============================================================= -->
      <!-- For demo purposes – can be removed on production -->
      <!-- For demo purposes – can be removed on production : End -->
      <!-- JavaScripts placed at the end of the document so the pages load faster -->
      <script src="{{ asset('frontend/js/jquery-1.11.1.min.js')}}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js')}}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('frontend/js/echo.min.js')}}"></script>
      <script src="{{ asset('frontend/js/jquery.easing-1.3.min.js')}}"></script>
      <script src="{{ asset('frontend/js/bootstrap-slider.min.js')}}"></script>
      <script src="{{ asset('frontend/js/jquery.rateit.min.js')}}"></script>
      <script type="text/javascript" src="{{ asset('frontend/js/lightbox.min.js')}}"></script>
      <script src="{{ asset('frontend/js/bootstrap-select.min.js')}}"></script>
      <script src="{{ asset('frontend/js/wow.min.js')}}"></script>
      <script src="{{ asset('frontend/js/scripts.js')}}"></script>
   </body>
</html>
