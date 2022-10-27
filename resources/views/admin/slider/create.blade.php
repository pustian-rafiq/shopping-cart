@extends('admin.admin_master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Add Slider</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Add New Slider</h5> 
              <a class="float-right btn btn-primary" href="{{ route('slider.view') }}">View Sliders</a>
            </div>
              <div class="card-body">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Title English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Enter slider title English">
                        @error('title_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Title Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title_bn" value="{{ old('title_bn') }}" placeholder="Enter slider title Bangla">
                        @error('title_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>  
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="description_en" value="{{ old('description_en') }}" placeholder="Enter slider description English">
                        @error('description_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="description_bn" value="{{ old('description_bn') }}" placeholder="Enter slider description Bangla">
                        @error('description_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                        <input class="form-control" id="image" type="file" name="slider_image" >
                        @error('slider_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      </div>
                  </div>
               </div> 
                <div class="form-group">
                  <img id="preview-image" style="border:1px solid black; height:100px; width:100px" src="{{ asset('frontend/media/brand.png') }}"
                  alt="preview image" style="max-height: 250px;">
                </div>
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Add Slider</button>
                </div><!-- form-layout-footer -->
          </form>
         </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->
  
 
@endsection
 