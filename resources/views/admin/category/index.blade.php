@extends('admin.admin_master')
@section('categories') active show-sub @endsection
@section('show-category') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Category List</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title d-inline">Category List</h5> 
                <a class="float-right btn btn-primary" href="{{ route('category.add') }}">Add New Category</a>
              </div>
             
              <div class="card-body">
              <div class="table-wrapper">
                <table id="example1" class=" table table-bordered table-striped">
                    <thead  class="bg-secondary">
                        <tr>
                          <th class="wd-30p">Category Icon</th>
                          <th class="wd-25p">Category name En</th>
                          <th class="wd-25p">Category name Bn</th>
                          <th class="wd-20p">Action</th>
                        </tr>
                      </thead>
                    <tbody class="bg-white">
                            @foreach ($categories as $item)
                            <tr>
                              <td>
                                <span><i class="{{ $item->category_icon }}"></i></span>
                              </td>
                              <td>{{ $item->category_name_en }}</td>
                              <td>{{ $item->category_name_bn }}</td>
                              <td>
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>
      
                                <a href="{{ route('category.delete', $item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot class="bg-secondary">
                        <tr>
                          <th class="wd-30p">Category Icon</th>
                          <th class="wd-25p">Category name En</th>
                          <th class="wd-25p">Category name Bn</th>
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
