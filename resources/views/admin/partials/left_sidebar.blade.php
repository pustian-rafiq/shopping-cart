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
    <a href="{{ route('brand.view') }}" class="sl-menu-link {{ request()->is('admin/brands*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Brands</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="{{ route('category.view') }}" class="sl-menu-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Categories</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Forms</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
      <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
      <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
      <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
      <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
    </ul>
    
  </div><!-- sl-sideleft-menu -->

  <br>
</div>