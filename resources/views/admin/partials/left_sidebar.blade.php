<div class="sl-logo"><a href="{{ url('/') }}"><i class="icon ion-android-star-outline"></i> Shopping Cart</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span><!-- input-group-btn -->
  </div><!-- input-group -->

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">
    <a href="{{ route('admin.dashboard') }}" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->

    </a><!-- sl-menu-link -->

     {{-- Slider Menu --}}
    <a href="{{ route('slider.view') }}" class="sl-menu-link {{ request()->is('admin/sliders*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Sliders</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    {{-- Brand Menu --}}
    <a href="{{ route('brand.view') }}" class="sl-menu-link {{ request()->is('admin/brands*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Brands</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

    <a href="#" class="sl-menu-link @yield('categories')">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Categories</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('category.view') }}" class="nav-link @yield('show-category')">Show Category</a></li>
      <li class="nav-item"><a href="{{ route('subcategory.view') }}" class="nav-link @yield('show-subcategory')">Sub Category</a></li>  
      <li class="nav-item"><a href="{{ route('subsubcategory.view') }}" class="nav-link @yield('subsubcategory')">Sub Sub Category</a></li>
    </ul>

    <a href="#" class="sl-menu-link @yield('products')">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Products</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('product.view') }}" class="nav-link @yield('showproduct')">Manage Products</a></li>
      <li class="nav-item"><a href="{{ route('product.add') }}" class="nav-link @yield('addproduct')">Add Product</a></li>  
      <li class="nav-item"><a href="{{ route('subsubcategory.view') }}" class="nav-link @yield('subsubcategory')">Manage Products</a></li>
    </ul>
    
  </div><!-- sl-sideleft-menu -->

  <br>
</div>



{{-- 
  
<a href="{{ route('category.view') }}" class="sl-menu-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Category</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="form-elements.html" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">Category</a></li>
      <li class="nav-item"><a href="form-layouts.html" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">Sub Category</a></li>
    </ul>  
  
--}}