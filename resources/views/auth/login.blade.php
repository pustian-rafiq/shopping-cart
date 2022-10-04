@extends('frontend.frontend_master')
@section('front_content')
<div class="breadcrumb">
   <div class="container">
      <div class="breadcrumb-inner">
         <ul class="list-inline list-unstyled">
            <li><a href="home.html">Home</a></li>
            <li class='active'>Login</li>
         </ul>
      </div>
      <!-- /.breadcrumb-inner -->
   </div>
   <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content">
   <div class="container">
      <div class="sign-in-page">
         <div class="row">
            <!-- Sign-in -->			
            <div class="col-md-6 col-sm-6 sign-in">
               <h4 class="">Sign in</h4>
               <p class="">Hello, Welcome to your account.</p>
               <div class="social-sign-in outer-top-xs">
                  <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                  <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
               </div>
              
                <form class="register-form outer-top-xs"  method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="form-group">
                     <label class="info-title" for="email1">Email Address <span>*</span></label>
                     <input type="email" class="form-control unicase-form-control text-input" id="email1" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus >
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                  </div>
                  <div class="form-group">
                     <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                     <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1"  name="password"  autocomplete="current-password" >
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                  </div>
                  <div class="radio outer-xs">
                     <label>
                     <input type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}  >Remember me!
                     </label>
                     @if (Route::has('password.request'))
                     <a class="forgot-password pull-right" href="{{ route('password.request') }}">
                        Forgot your Password?
                     </a>
                     @endif
                     {{-- <a href="#" class="forgot-password pull-right">Forgot your Password?</a> --}}
                  </div>
                  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
               </form>
            </div>
            <!-- Sign-in -->
            <!-- create a new account -->
            <div class="col-md-6 col-sm-6 create-new-account">
               <h4 class="checkout-subtitle">Create a new account</h4>
               <p class="text title-tag-line">Create your new account.</p>
               <form class="register-form outer-top-xs"  method="POST" action="{{ route('register') }}">
                @csrf
                  <div class="form-group">
                     <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                     <input type="email" placeholder="Enter yout email address" class="form-control unicase-form-control text-input" id="exampleInputEmail2"  name="email"   >
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                     <label class="info-title" for="name">Name <span>*</span></label>
                     <input type="text" placeholder="Enter your name" class="form-control unicase-form-control text-input" id="name" name="name" value="{{ old('name') }}">
                     
                     @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="phone">Phone Number <span>*</span></label>
                    <input type="text" name="phone" value="{{ old('phone') }}"  class="form-control unicase-form-control text-input" id="phone" placeholder="Enter your phone number" >
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                  <div class="form-group">
                     <label class="info-title" for="password">Password <span>*</span></label>
                     <input type="password" placeholder="Enter your password" class="form-control unicase-form-control text-input" name="password" id="password" >
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                  </div>
                  <div class="form-group">
                     <label class="info-title" for="confirm_password">Confirm Password <span>*</span></label>
                     <input type="password" placeholder="Re-type password" class="form-control unicase-form-control text-input" id="confirm_password" name="password_confirmation" >
                  </div>
                  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
               </form>
            </div>
            <!-- create a new account -->			
         </div>
         <!-- /.row -->
      </div>
      <!-- /.sigin-in-->
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
<!-- /.body-content -->
@endsection
