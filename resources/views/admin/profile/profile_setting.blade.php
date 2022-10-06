@extends('admin.admin_master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Shopping Cart</a>
      <a class="breadcrumb-item" href="index.html">Profile</a>
      <span class="breadcrumb-item active">Settings</span>
    </nav>

    <div class="sl-pagebody">

 
       
        <div class="sign-in-page">
          <div class="row">
              <div class="col-sm-12 col-md-6  offset-md-3 mb-3">
                <div class="card">
                  <h3 class="text-center">   <strong class="text-warning">Update Personal Info</strong></h3>
                      <div class="card-body">
                          <form action="{{ route('change.profile') }}" method="POST">
                              @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Name</label>
                                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                                  @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                  @error('email')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
  
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Phone</label>
                                  <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->phone }}">
                                  @error('phone')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                          </form>
                      </div>
                 </div>
            </div>
              <div class="col-md-6 offset-md-3 mb-4">
                <div class="card">
                  <h3 class="text-center">   <strong class="text-warning">Update Password</strong></h3>
                      <div class="card-body">
                        <form action="{{ route('change.password') }}" method="POST">
                          @csrf
                            <div class="form-group">
                              <label for="old_password">Old Password</label>
                              <input type="password" name="old_password" class="form-control" id="old_password" aria-describedby="emailHelp" placeholder="old password">
                              @error('old_password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="new_password">New Password</label>
                              <input type="password" name="new_password" class="form-control" id="new_password" aria-describedby="emailHelp" placeholder="new password">
                              @error('new_password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="password_confirmation">Confirm Password</label>
                              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" aria-describedby="emailHelp" placeholder="Re-Type Passowrd">
                              @error('password_confirmation')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                        
                          <div class="form-group">
                              <button type="submit" class="btn btn-danger">Change Password</button>
                          </div>
                      </form>
                      </div>
                 </div>
            </div>
          </div>
          <div class="row mt-2">
              <div class="col-sm-12 col-md-6  offset-md-3 mb-3">
                <div class="card">
                  <h3 class="text-center">   <strong class="text-warning">Update Photo</strong></h3>
                      <div class="card-body">
                        <form action="{{ route('change.image') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <input type="hidden" name="old_image" value="{{ Auth::user()->photo }}">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" name="image" id="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                            </div>
                            <div class="col-md-6">
                              <div class="col-md-6 mb-2">
                                <img id="preview-image" style="border:1px solid black; height:100px; width:100px" src="{{ asset(Auth::user()->photo) }}"
                                    alt="preview image" style="max-height: 250px;">
                               </div>
                            </div>
                          </div>
                      </form>
                      </div>
                 </div>
            </div>
             
          </div>
      </div><!-- row -->
    </div><!-- sl-pagebody -->
  
 
@endsection
