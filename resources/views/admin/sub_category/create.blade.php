@extends('admin.admin_master')
@section('categories') active show-sub @endsection
@section('show-subcategory') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Add Sub Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Add New Sub-Category</h5> 
              <a class="float-right btn btn-primary" href="{{ route('category.view') }}">View Sub-Categories</a>
            </div>
              <div class="card-body">
            <form action="{{ route('subcategory.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                  <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                    <option label="Choose one category"></option>
                    @foreach ($categories as $cat)
                    {{-- <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option> --}}
                    <option value="{{ $cat->id }}">{{ $cat->category_name_en }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Sub Category Name English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subcategory_name_en" value="{{ old('subcategory_name_en') }}" placeholder="Enter sub category name">
                  @error('subcategory_name_en')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Sub Category Name Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subcategory_name_bn" value="{{ old('subcategory_name_bn') }}" placeholder="Enter sub category name">
                  @error('subcategory_name_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

               
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Add SubCategory</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->
  
 
@endsection
 