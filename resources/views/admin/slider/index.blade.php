@extends('admin.admin_master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('/') }}">Shopping Cart</a>
      <span class="breadcrumb-item active">Dashboard</span>
      <span class="breadcrumb-item active">Sliders List</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title d-inline">Sliders List</h5> 
                <a class="float-right btn btn-primary" href="{{ route('slider.add') }}">Add New Slider</a>
              </div>
             
              <div class="card-body">
              <div class="table-wrapper">
                <table id="example1" class=" table table-bordered table-striped">
                    <thead  class="bg-secondary">
                        <tr>
                          <th class="wd-30p">Slider Image</th>
                          <th class="wd-25p">Slider Title En</th>
                          <th class="wd-25p">Slider Title Bn</th>
                          <th class="wd-25p">Slider Description En</th>
                          <th class="wd-25p">Slider Description Bn</th>
                          <th class="wd-20p">Action</th>
                        </tr>
                      </thead>
                    <tbody class="bg-white">
                            @foreach ($sliders as $item)
                            <tr>
                              <td>
                                <img src="{{ asset($item->slider_image) }}" alt="" style="width: 80px;">
                              </td>
                              <td>{{ $item->brand_name_en }}</td>
                              <td>{{ $item->title_en }}</td>
                              <td>{{ $item->title_bn }}</td>
                              <td>{{ $item->description_en }}</td>
                              <td>{{ $item->brand_name_bn }}</td>
                              <td>
                                <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>
      
                                <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot class="bg-secondary">
                        <tr>
                          <th class="wd-30p">Slider Image</th>
                          <th class="wd-25p">Slider Title En</th>
                          <th class="wd-25p">Slider Title Bn</th>
                          <th class="wd-25p">Slider Description En</th>
                          <th class="wd-25p">Slider Description Bn</th>
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
