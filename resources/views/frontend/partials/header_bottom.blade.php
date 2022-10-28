<div class="main-header">
    <div class="container">
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
             <!-- ============================================================= LOGO ============================================================= -->
             <div class="logo">
                <a href="{{ url('/') }}">
                <img src="{{ asset('frontend/images/logo.png')}}" alt="">
                </a>
             </div>
             <!-- /.logo -->
             <!-- ============================================================= LOGO : END ============================================================= -->				
          </div>
          <!-- /.logo-holder -->
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
             <!-- /.contact-row -->
             <!-- ============================================================= SEARCH AREA ============================================================= -->
             <div class="search-area">
                <form>
                   <div class="control-group">
                      <ul class="categories-filter animate-dropdown">
                         <li class="dropdown">
                            <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">{{ session()->get('language') === 'bangla' ? 'ক্যাটাগরিস' : 'Categories'}} <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu" >
                              @foreach ($categories as $category)
                              {{-- Show category --}}
                              <li class="menu-header"> {{ session()->get('language') === 'bangla' ? $category->category_name_bn : $category->category_name_en }}</li>
                              
                              {{-- Show sub category --}}
                               @php
                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en')->get();
                               @endphp
                            @foreach ($subcategories as $subcategory)
                              <li role="presentation">
                                 <a role="menuitem" tabindex="-1" href="category.html">
                                    -  {{ session()->get('language') === 'bangla' ? $subcategory->subcategory_name_bn : $subcategory->subcategory_name_en}}
                                 </a>
                              </li>
                              
                              @endforeach
                            @endforeach
                              
                            </ul>
                         </li>
                      </ul>
                      <input class="search-field" placeholder="{{session()->get('language') === 'bangla' ? 'এখানে খোঁজ করুন...' : 'Search here....'}}" />
                      <a class="search-button" href="#" ></a>    
                   </div>
                </form>
             </div>
             <!-- /.search-area -->
             <!-- ============================================================= SEARCH AREA : END ============================================================= -->				
          </div>
          <!-- /.top-search-holder -->
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
             <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
             <div class="dropdown dropdown-cart">
                <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                   <div class="items-cart-inner">
                      <div class="basket">
                         <i class="glyphicon glyphicon-shopping-cart"></i>
                      </div>
                      <div class="basket-item-count"><span class="count">2</span></div>
                      <div class="total-price-basket">
                         <span class="lbl">{{ session()->get('language') === 'bangla' ? 'কার্ট' : 'Cart'}} -</span>
                         <span class="total-price">
                         <span class="sign">$</span><span class="value">600.00</span>
                         </span>
                      </div>
                   </div>
                </a>
                <ul class="dropdown-menu">
                   <li>
                      <div class="cart-item product-summary">
                         <div class="row">
                            <div class="col-xs-4">
                               <div class="image">
                                  <a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a>
                               </div>
                            </div>
                            <div class="col-xs-7">
                               <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                               <div class="price">$600.00</div>
                            </div>
                            <div class="col-xs-1 action">
                               <a href="#"><i class="fa fa-trash"></i></a>
                            </div>
                         </div>
                      </div>
                      <!-- /.cart-item -->
                      <div class="clearfix"></div>
                      <hr>
                      <div class="clearfix cart-total">
                         <div class="pull-right">
                            <span class="text">Sub Total :</span><span class='price'>$600.00</span>
                         </div>
                         <div class="clearfix"></div>
                         <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
                      </div>
                      <!-- /.cart-total-->
                   </li>
                </ul>
                <!-- /.dropdown-menu-->
             </div>
             <!-- /.dropdown-cart -->
             <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				
          </div>
          <!-- /.top-cart-row -->
       </div>
       <!-- /.row -->
    </div>
    <!-- /.container -->
 </div>
 <!-- /.main-header -->
 