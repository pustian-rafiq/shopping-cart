@extends('admin.admin_master')
@section('categories') active show-sub @endsection
@section('show-subcategory') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">SubCategory List</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title d-inline">Brand List</h5> 
                <a class="float-right btn btn-primary" href="{{ route('subcategory.add') }}">Add New Sub-Category</a>
              </div>
             
              <div class="card-body">
              <div class="table-wrapper">
                <table id="example1" class=" table table-bordered table-striped">
                    <thead  class="bg-secondary">
                        <tr>
                          <th class="wd-30p">Category Name</th>
                          <th class="wd-25p">SubCategory name En</th>
                          <th class="wd-25p">SubCategory name Bn</th>
                          <th class="wd-20p">Action</th>
                        </tr>
                      </thead>
                    <tbody class="bg-white">
                            @foreach ($subCategories as $item)
                            <tr>
                              <td>{{ $item->category->category_name_en }}</td>
                              <td>{{ $item->subcategory_name_en }}</td>
                              <td>{{ $item->subcategory_name_bn }}</td>
                              <td>
                                <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit Subcategory"> <i class="fa fa-pencil"></i></a>
      
                                <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Subcategory"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot class="bg-secondary">
                        <tr>
                          <th class="wd-30p">Category Name</th>
                          <th class="wd-25p">SubCategory name En</th>
                          <th class="wd-25p">SubCategory name Bn</th>
                          <th class="wd-20p">Action</th>
                          </tr>
                    </tfoot>
                  </table>
              </div><!-- table-wrapper -->
            </div>
            </div><!-- card -->
        </div>
     
    </div><!-- row -->
</div><!-- sl-pagebody -->
  
 
@endsection
