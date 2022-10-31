<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> {{ session()->get('language') === 'bangla' ? 'ক্যাটাগরিস' : 'Categories'}}</div>
  <nav class="yamm megamenu-horizontal" role="navigation">
     <ul class="nav">

      @foreach ($categories as $category)
        <li class="dropdown menu-item">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>
            {{ session()->get('language') === 'bangla' ? $category->category_name_bn : $category->category_name_en }}
          </a>
           <ul class="dropdown-menu mega-menu">
              <li class="yamm-content">
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
                 </div>
                 <!-- /.row -->
              </li>
              <!-- /.yamm-content -->                    
           </ul>
           <!-- /.dropdown-menu -->            
        </li>
        @endforeach

     </ul>
     <!-- /.nav -->
  </nav>
  <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
