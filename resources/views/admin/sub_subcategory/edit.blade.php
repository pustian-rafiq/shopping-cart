@extends('admin.admin_master')
@section('categories') active show-sub @endsection
@section('subsubcategory') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Edit Sub Sub-Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title d-inline">Edit Sub Sub-Category</h5> 
              <a class="float-right btn btn-primary" href="{{ route('subsubcategory.view') }}">View Sub Sub-Categories</a>
            </div>
              <div class="card-body">
            <form action="{{ route('subsubcategory.update',$subsubcategory->id) }}" method="POST" >
                @csrf
                <div class="form-group">
                  <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="category_id" data-placeholder="Select One" name="category_id">
                    <option label="Choose one category"></option>
                    @foreach ($categories as $cat)
                    {{-- <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option> --}}
                    <option value="{{ $cat->id }}" {{ $cat->id === $subsubcategory->category_id ? 'selected' : '' }}>{{ ucwords($cat->category_name_en) }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label">Select Sub-Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-id="{{ $subsubcategory->subcategory_id}}" data-placeholder="Select One" id="subcategory_id" name="subcategory_id">
                    <option label="Choose one sub category"></option>
                    
                  </select>
                  @error('subcategory_id')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Sub SubCategory Name English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subsubcategory_name_en" value="{{ $subsubcategory->subsubcategory_name_en }}" placeholder="Enter sub sub category name">
                  @error('subsubcategory_name_en')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-control-label">Sub SubCategory Name Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="subsubcategory_name_bn"  value="{{ $subsubcategory->subsubcategory_name_bn }}" placeholder="Enter sub sub-category name">
                  @error('subsubcategory_name_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

               
                <div class="form-layout-footer ">
                  <button type="submit" class="btn btn-info " style="cursor:pointer">Update Sub SubCategory</button>
                </div><!-- form-layout-footer -->
              </form>
              </div>
          </div>
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->

<script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>
{{-- Get all sub categories under a category when loading this edit page--}}
<script>
$(document).ready(function(){
    console.log("first")
    // var category_id = $(this).val();
    var subcategory_id = document.getElementById("subcategory_id")
    var subcategory_id = subcategory_id.getAttribute("data-id");

    var category_id = document.getElementById("category_id")
        var cat_id = category_id.value;
        console.log(cat_id)
        if(cat_id) {
            $.ajax({
                url: "{{  url('/admin/subcategory/ajax') }}/"+cat_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   console.log(data)
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"' + (Number(subcategory_id) === value.id ? 'selected="selected"' : '') +' >' +  value.subcategory_name_en + '</option>');
                          // $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');

                      });

                },

            });
        } else {
            alert('danger');
        }
});
</script>

{{-- Get sub category when select a category--}}
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
 