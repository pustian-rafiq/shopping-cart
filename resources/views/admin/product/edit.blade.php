@extends('admin.admin_master')


@section('content')
@section('products') active show-sub @endsection
@section('showproduct') active @endsection


<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">SHopMama</a>
    <span class="breadcrumb-item active">Update Product</span>
  </nav>

  <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update product</h6>
        <form action="{{ route('product.update',$editProduct->id) }}" method="POST">
          @csrf
      <div class="row row-sm">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                      <select class="form-control select2-show-search" data-placeholder="Select One" name="brand_id">
                        <option label="Choose one"></option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $editProduct->brand_id === $brand->id ? 'selected' : '' }}>{{ ucwords($brand->brand_name_en) }}</option>
                        @endforeach
                      </select>
                      @error('brand_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                      <select class="form-control select2-show-search" data-placeholder="Select One" id="category_id" name="category_id">
                        <option label="Choose one"></option>
                        @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $editProduct->category_id === $cat->id ? 'selected' : '' }}>{{ ucwords($cat->category_name_en) }}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="form-control-label">Select Sub-Category: <span class="tx-danger">*</span></label>
                      <select class="form-control select2-show-search" data-id="{{ $editProduct->subcategory_id}}" id="subcategory_id" data-placeholder="Select One" name="subcategory_id">
                        <option label="Choose one"></option>
                       
                      </select>
                      @error('subcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group">
                      <label class="form-control-label">Select Sub-SubCategory: <span class="tx-danger">*</span></label>
                      <select class="form-control select2-show-search" data-id="{{ $editProduct->subsubcategory_id}}" data-placeholder="Select One" id="subsubcategory_id" name="subsubcategory_id">
                        
                      </select>
                      @error('subsubcategory_id')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
              </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name_en" value="{{  $editProduct->product_name_en  }}" placeholder="Enter Product Name English">
                  @error('product_name_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name_bn" value="{{ $editProduct->product_name_bn }}" placeholder="Product Name Bangla">
                  @error('product_name_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{  $editProduct->product_code }}" placeholder="Enter Product Code">
                  @error('product_code')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_qty" value="{{ $editProduct->product_qty }}" placeholder="Enter Product Quantity">
                  @error('product_qty')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Tags English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_tags_en" value="{{ $editProduct->product_tags_en }}" placeholder="Product Tags English" data-role="tagsinput">
                  @error('product_tags_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Tags Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_tags_bn" value="{{ $editProduct->product_tags_bn }}" placeholder="product tags bangla" data-role="tagsinput">
                  @error('product_tags_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size_en" value="{{ $editProduct->product_size_en }}" placeholder="Product Size English" data-role="tagsinput">
                  @error('product_size_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size_bn" value="{{ $editProduct->product_size_bn }}" placeholder="Product Size Bangla" data-role="tagsinput">
                  @error('product_size_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color_en" value="{{ $editProduct->product_color_en }}" placeholder="Product Color Rnglish" data-role="tagsinput">
                  @error('product_color_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color_bn" value="{{ $editProduct->product_color_bn }}" placeholder="Enter Product Color Bangla" data-role="tagsinput">
                  @error('product_color_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" value="{{  $editProduct->selling_price }}" placeholder="Selling Price">
                  @error('selling_price')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price" value="{{  $editProduct->discount_price }}" placeholder="Discount Price">
                  @error('discount_price')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Short Description English: <span class="tx-danger">*</span></label>
                  <textarea name="short_descp_en" id="summernote">
                    {{$editProduct->short_descp_en}}
                  </textarea>
                  @error('short_descp_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Short Description Bangla: <span class="tx-danger">*</span></label>
                  <textarea name="short_descp_bn" id="summernote2">
                    {{$editProduct->short_descp_bn}}
                  </textarea>
                  @error('short_descp_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Long Description English: <span class="tx-danger">*</span></label>
                  <textarea name="long_descp_en" id="summernote3">
                    {{$editProduct->long_descp_en}}
                  </textarea>
                  @error('long_descp_en')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Long Description Bangla: <span class="tx-danger">*</span></label>
                  <textarea name="long_descp_bn" id="summernote4">
                    {{$editProduct->long_descp_bn}}
                  </textarea>
                  @error('long_descp_bn')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="col-md-3">
            <label class="ckbox">
              <input type="checkbox" name="hot_deals" value="1" {{$editProduct->hot_deals === 1 ? 'checked' : '' }}><span>Hot Deals</span>
            </label>
            </div>

            <div class="col-md-3">
              <label class="ckbox">
                <input type="checkbox" name="featured" value="1" {{$editProduct->featured === 1 ? 'checked' : '' }}><span>Featured</span>
              </label>
              </div>

              <div class="col-md-3"> 
                  <label class="ckbox">
                    <input type="checkbox" name="special_offer" value="1"   {{$editProduct->special_offer === 1 ? 'checked' : '' }} ><span>special_offer</span>
                  </label>
              </div>

              <div class="col-md-3">
                  <label class="ckbox">
                    <input type="checkbox" name="special_deals" value="1"  {{$editProduct->special_deals === 1 ? 'checked' : '' }}><span>special_deals</span>
                  </label>
              </div>

            <div class="form-layout-footer mt-3">
            <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;" >Add Products</button>
          </div><!-- form-layout-footer -->
      </form>
      </div>
      </div><!-- row -->


</div>


 

  <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Product Thumbnail</h6>
        <form action="{{ route('product.thumbnail.update',$editProduct->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="old_image" value="{{ $editProduct->product_thambnail }}">
          <div class="row row-sm" style="margin-top:30px;">
            <div class="col-md-6">
              <div class="form-group">
                  <label class="form-control-label">Main Thambnail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="product_thambnail" value="{{ old('product_thambnail') }}" onchange="mainThambUrl(this)">
                  @error('product_thambnail')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                {{-- <img src="" id="mainThmb"> --}}
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <img id="mainThmb" style="border:1px solid black; height:150px; width:150px" src="{{asset($editProduct->product_thambnail) }}"
                alt="preview image" style="max-height: 250px;">
                 {{-- <img class="card-img-top" src="{{ asset($editProduct->product_thambnail) }}" id="mainThmb" alt="Card image cap" style="height: 150px; width:150px;"> --}}
               
                </div>
            </div>
          </div>
          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info">Update Thumbnail</button>
          </div><!-- form-layout-footer -->
        </form>
      </div>
  </div><!-- row -->

  {{-- Update product images --}}
  <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Product Multiple Image</h6>
        <form action="{{ route('product.multiImage.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row row-sm" style="margin-top:50px;">

            @foreach ($multiple_images as $img)
                <div class="col-md-3">
                  <img  style="border:1px solid black; height:150px; width:150px" src="{{asset($img->photo_name) }}"
                  alt="preview image" style="max-height: 250px;">
                  {{-- <img class="" src="{{ asset($img->photo_name) }}" alt="Card image cap" style="height: 150px; width:150px;"> --}}
                  <h5 class="mt-2">
                    <a href="{{ route('product.image.delete', $img->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                  </h5>
                  <div class="form-group">
                    <label class="form-control-label">Change Image<span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="multiImg[{{ $img->id }}]" >
                  </div>
            
                </div>
            @endforeach
          </div>
          <div class="form-layout-footer">
            <button type="submit" class="btn btn-info">Update Multiple Image</button>
          </div><!-- form-layout-footer -->
        </form>
      </div>
  </div><!-- row -->


 



<script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

{{-- 
    Get all sub categories after loading the product edit page
    Jakhon product edit page load hbe takhon category, sub category and sub subcategory selected dekhabe
 --}}
<script>

    $(document).ready(function(){
        var category_id = document.getElementById("category_id")
        var subcategory_id = document.getElementById("subcategory_id")
            var cat_id = category_id.value;
            var subcat_id = subcategory_id.getAttribute("data-id");
            if(cat_id) {
                $.ajax({
                    url: "{{  url('/admin/subcategory/ajax') }}/"+cat_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        console.log(data)
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'" ' + (Number(subcat_id) === value.id ? 'selected="selected"' : '') +' >' + value.subcategory_name_en + '</option>');
                          });
                          getSubSubCategory(subcat_id)
                    },
    
                });
            } 
    });
</script>

{{-- Get all sub subcategories after loading the product edit page --}}
{{-- <script>

    $(document).ready(function(){
        var subcategory_id = document.getElementById("subcategory_id")
        var subsubcategory_id = document.getElementById("subsubcategory_id")
            var subcat_id = subcategory_id.value;
            var subsubcat_id = subsubcategory_id.getAttribute("data-id");
            console.log("subcat_id",subcat_id)
            console.log("subsubcategory_id",subsubcat_id)
            if(subcat_id) {
                $.ajax({
                    url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcat_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       console.log(data)
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'" ' + (Number(subsubcat_id) === value.id ? 'selected="selected"' : '') +' >' + value.subcategory_name_en + '</option>');
                          });
    
                    },
    
                });
            } 
    });
</script> --}}

{{-- Select all sub categories under a category --}}
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
                // console.log("sub sub", data)
                // console.log("sub sub", data[0].id)
               
                $('select[name="subsubcategory_id"]').html('');

                 var d =$('select[name="subcategory_id"]').empty();
                    $.each(data, function(key, value){

                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');

                    });
                    getSubSubCategory(data[0].id)
              },

          });
      } else {
          alert('danger');
      }

  });

  // Select all sub sub-categories under a sub-category 
  $('select[name="subcategory_id"]').on('change', function(){
      var subcategory_id = $(this).val();
      if(subcategory_id) {
          $.ajax({
              url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
              type:"GET",
              dataType:"json",
              success:function(data) {
                // console.log("sub sub", data)
                // getSubSubCategory(subcategory_id)
                 var d =$('select[name="subsubcategory_id"]').empty();
                    $.each(data, function(key, value){

                        $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');

                    });

              },

          });
      } else {
          alert('danger');
      }

  });

});

</script>

{{-- 
    Get all sub sub categories and selected sub sub category.
    Jakhon product edit page load hbe takhon category, sub category and sub subcategory selected dekhabe
    
--}}
 
<script>
  function getSubSubCategory(subcategory_id){
          // var subcategory_id = document.getElementById("subcategory_id")
          // var subcat_id = subcategory_id.value;
          var subsubcategory_id = document.getElementById("subsubcategory_id")
            var subsubcategory_id = subsubcategory_id.getAttribute("data-id");

          console.log("subcategory_id",subcategory_id)
          console.log("subsubcategory_id",subsubcategory_id)
          if(subsubcategory_id) {
            $.ajax({
              url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
              type:"GET",
              dataType:"json",
              success:function(data) {
                // console.log("sub sub", data)
                // getSubSubCategory(subcategory_id)
                 var d =$('select[name="subsubcategory_id"]').empty();
                    $.each(data, function(key, value){

                        $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'"' + (Number(subsubcategory_id) === value.id ? 'selected="selected"' : '') +' >' + value.subsubcategory_name_en + '</option>');

                    });

              },

          });
          } 
  }
 
  </script>

<script>

$(document).ready(function(){
$('#multiImg').on('change', function(){ //on file input change
if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
{
    var data = $(this)[0].files; //this file data

    $.each(data, function(index, file){ //loop though each file
        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
            var fRead = new FileReader(); //new filereader
            fRead.onload = (function(file){ //trigger function on successful read
            return function(e) {
                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
            .height(80); //create image element
                $('#preview_img').append(img); //append image to output element
            };
            })(file);
            fRead.readAsDataURL(file); //URL representing the file's data.
        }
    });

}else{
    alert("Your browser doesn't support File API!"); //if File API is absent
}
});
});

</script>

<script>
function mainThambUrl(input){
if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e){
      $('#mainThmb').attr('src',e.target.result).width(80)
            .height(80);
  };
  reader.readAsDataURL(input.files[0]);


}
}
</script>
 
@endsection
 