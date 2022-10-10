@extends('admin.admin_master')
@section('categories') active show-sub @endsection
@section('subsubcategory') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Add Sub Sub-Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Add Sub Sub-Category</h5> 
              <a class="float-right btn btn-primary" href="{{ route('subsubcategory.view') }}">View Sub Sub-Categories</a>
            </div>
              <div class="card-body">
            <form action="{{ route('subsubcategory.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                  <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                    <option label="Choose one category"></option>
                    @foreach ($categories as $cat)
                    {{-- <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option> --}}
                    <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Select One" name="subcategory_id">
                    <option label="Choose one sub category"></option>
                    
                  </select>
                  @error('subcategory_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Sub SubCategory Name English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subsubcategory_name_en" value="{{ old('subsubcategory_name_en') }}" placeholder="Enter sub sub category name">
                  @error('subsubcategory_name_en')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Sub SubCategory Name Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{ old('subcategory_name_bn') }}" placeholder="Enter sub sub-category name">
                  @error('subsubcategory_name_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

               
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Add Sub SubCategory</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->

<script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                  // console.log(data)
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');

                      });

                },

            });
        } else {
            alert('danger');
        }

    });

});

</script>
 
@endsection
 