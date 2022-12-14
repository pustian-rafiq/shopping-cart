@extends('admin.admin_master')
@section('products') active show-sub @endsection
@section('showproduct') active @endsection

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Product List</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title d-inline">Product List</h5> 
                <a class="float-right btn btn-primary" href="{{ route('product.add') }}">Add New Product</a>
              </div>
              <div class="card-body">
              <div class="table-wrapper">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="wd-20p">Image</th>
                      <th class="wd-20p">Product Name English</th>
                      <th class="wd-20p">Product Price</th>
                      <th class="wd-15p">Product Quantity</th>
                      <th class="wd-5p">Product Discount</th>
                      <th class="wd-5p">Status</th>
                      <th class="wd-15p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $item)
                    <tr>
                      <td>
                          <img src="{{ asset($item->product_thambnail) }}" alt="" style="height: 60px; width:60px;">
                      </td>
                      <td>{{ $item->product_name_en }}</td>
                      <td>{{ $item->selling_price }}$</td>
                      <td>{{ $item->product_qty }}</td>
                      <td>
                        @if ($item->discount_price == NULL)
                        <span class="badge badge-pill badge-danger">No</span>
                        @else
                        @php
                            $amount = $item->selling_price - $item->discount_price;
                           $discount =  ( $amount/$item->selling_price) * 100;
                        @endphp
                           <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                        @endif
                      </td>
                      <td>
                        {{-- @if ($item->status == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                          @else
                          <span class="badge badge-pill badge-danger">Inactive</span>
                        @endif --}}
                        @if ($item->status == 1)
                        <a href="{{ route('product.active',$item->id) }}" class="badge badge-pill badge-success" title="Active Product">Active<i class="fa fa-arrow-up"></i></a>
                        @else
                        <a href="{{ route('product.inactive',$item->id) }}" class="badge badge-pill badge-danger" title="Inactive Product"> Inactive<i class="fa fa-arrow-down"></i></a>
                      @endif
                      </td>
                      <td>
                        <a href=" " class="btn btn-sm btn-primary" title="View Product"> <i class="fa fa-eye"></i></a>
                        {{-- @isset(auth()->user()->role->permission['permission']['product']['edit']) --}}
                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit Product"> <i class="fa fa-pencil"></i></a>
                        {{-- @endisset --}}

                        {{-- @isset(auth()->user()->role->permission['permission']['product']['delete']) --}}
                        <a href="{{ route('product.delete', $item->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Product"><i class="fa fa-trash"></i></a>
                        {{-- @endisset --}}

                        {{-- @if ($item->status == 1)
                       <a href="{{ url('admin/product-inactive/'.$item->id) }}" class="btn btn-sm btn-danger" title="Inactive Product"> <i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{ url('admin/product-active/'.$item->id) }}" class="btn btn-sm btn-success" title="Active Product"> <i class="fa fa-arrow-up"></i></a>
                      @endif --}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                    <tfoot class="bg-secondary">
                        <tr>
                          <th class="wd-20p">Image</th>
                          <th class="wd-20p">Product Name English</th>
                          <th class="wd-20p">Product Price</th>
                          <th class="wd-15p">Product Quantity</th>
                          <th class="wd-5p">Product Discount</th>
                          <th class="wd-5p">Status</th>
                          <th class="wd-15p">Action</th>
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
