@extends('frontend.frontend_master')

@section('title') {{ session()->get('language') === 'bangla' ? substr($productDetails->product_name_bn,0,20) : substr($productDetails->product_name_en,0,20) }} | Shopping Cart @endsection

@section('front_content')

@php
function bn_price($str)
{
    $en = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    $bn = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'];
    $str = str_replace($en, $bn, $str);
    return $str;
}
@endphp
  <!-- ============================================== SIDEBAR ============================================== -->	
    <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
      <!-- ================================== Left sidebar start ================================== -->
      @include("frontend.partials.left_sidebar")
      <!-- ================================== Left sidebar end ================================== -->
      @include("frontend.partials.left_bottom_sidebar")
   </div>

Product Details
@endsection