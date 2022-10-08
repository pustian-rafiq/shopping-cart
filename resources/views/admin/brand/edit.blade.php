@extends('admin.admin_master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Edit Brand</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Edit Brand</h5> 
              <a class="float-right btn btn-primary" href="{{ route('brand.view') }}">Back</a>
            </div>
              <div class="card-body">
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="brand_name_en" value="{{ $brand->brand_name_en }}" placeholder="Enter brand_name_en">
                  @error('brand_name_en')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="brand_name_bn" value="{{ $brand->brand_name_bn }}" placeholder="Enter brand_name_bn">
                  @error('brand_name_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" id="image" value={{$brand->brand_image}} type="file" name="brand_image">
                  @error('brand_image')
                  <span class="text-danger">{{ $message }}</span>
               @enderror
                </div>{{$brand->brand_image}}
                <div class="form-group">
                  <img id="preview-image" style="border:1px solid black; height:100px; width:100px" src="{{ asset($brand->brand_image) }}"
                  alt="preview image" style="max-height: 250px;">
                </div>
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Update Brand</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->
  
 
@endsection
 