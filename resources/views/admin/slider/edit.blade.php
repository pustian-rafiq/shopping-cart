@extends('admin.admin_master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Edit Slider</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Edit Slider</h5> 
              <a class="float-right btn btn-primary" href="{{ route('slider.view') }}">View Sliders</a>
            </div>
              <div class="card-body">
            <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Title English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title_en" value="{{  $slider->title_en }}" placeholder="Enter slider title English">
                        @error('title_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Title Bangla: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="title_bn" value="{{ $slider->title_bn }}" placeholder="Enter slider title Bangla">
                        @error('title_bn')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>  
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="description_en" value="{{ $slider->description_en }}" placeholder="Enter slider description English">
                        @error('description_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="description_bn" value="{{ $slider->description_bn }}" placeholder="Enter slider description Bangla">
                        @error('description_bn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                        <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">
                        <input class="form-control" id="image" type="file" name="slider_image" >
                        @error('slider_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      </div>
                  </div>
               </div> 
                <div class="form-group">
                  <img id="preview-image" style="border:1px solid black; height:100px; width:100px" src="{{ asset($slider->slider_image) }}"
                  alt="preview image" style="max-height: 250px;">
                </div>
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Update Slider</button>
                </div><!-- form-layout-footer -->
          </form>
         </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->
  
 
@endsection
 