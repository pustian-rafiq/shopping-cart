@extends('admin.admin_master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Add Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Add New Category</h5> 
              <a class="float-right btn btn-primary" href="{{ route('category.view') }}">View Categories</a>
            </div>
              <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="category_name_en" value="{{ old('category_name_en') }}" placeholder="Enter category name">
                  @error('category_name_en')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="category_name_bn" value="{{ old('category_name_bn') }}" placeholder="Enter category name">
                  @error('category_name_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="category_icon" value="{{ old('category_icon') }}" placeholder="Enter category icon class name">
                      @error('category_icon')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                </div>
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Add Category</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->
  
 
@endsection
 