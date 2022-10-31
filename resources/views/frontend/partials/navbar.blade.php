<div class="header-nav animate-dropdown">
   <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
         <div class="navbar-header">
            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>
         <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
               <div class="nav-outer">
                  <ul class="nav navbar-nav">
                     <li class="active dropdown yamm-fw">
                        <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                          {{ session()->get('language') === 'bangla' ? 'হোম' : 'Home'}}
                        </a>
                     </li>
                     {{-- Shows all categories, sub-categories and sub-sub-categories --}}
                     @php
                     $categories = App\Models\Category::orderBy('category_name_en')->get();
                  @endphp
                     @foreach ($categories as $category)
                        
                     <li class="dropdown yamm mega-menu">
                        <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                           {{ session()->get('language') === 'bangla' ? $category->category_name_bn : $category->category_name_en }}
                        </a>
                        <ul class="dropdown-menu container">
                           <li>
                              <div class="yamm-content ">
                                 <div class="row">

                                    {{-- Show all sub categories --}}
                                    @php
                                       $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en')->get();
                                    @endphp
                                    @foreach ($subcategories as $subcategory)
                                       

                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                       <h2 class="title">
                                          {{ session()->get('language') === 'bangla' ? $subcategory->subcategory_name_bn : $subcategory->subcategory_name_en}}
                                       </h2>
                                       <ul class="links">
                                          {{-- Show all sub sub-categories --}}
                                          @php
                                            $sub_subcategories = App\Models\SubSubCategory::where('subcategory_id', $subcategory->id)->orderBy('subsubcategory_name_en')->get();
                                          @endphp
                                          @foreach ($sub_subcategories as $sub_subcategory)
                                           <li>
                                             <a href="#">
                                               {{session()->get('language') === 'bangla' ? $sub_subcategory->subsubcategory_name_bn : $sub_subcategory->subsubcategory_name_en }}
                                            </a>
                                           </li>
                                          @endforeach
                                     

                                       </ul>
                                    </div>
                                    @endforeach
                       
                                    {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                       <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt="">
                                    </div> --}}
                                    <!-- /.yamm-content -->					
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </li>
                     @endforeach
                     {{-- <li class="dropdown  navbar-right special-menu">
                        <a href="#">Todays offer</a>
                     </li> --}}
                  </ul>
                  <!-- /.navbar-nav -->
                  <div class="clearfix"></div>
               </div>
               <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default -->
   </div>
   <!-- /.container-class -->
</div>
<!-- /.header-nav -->
