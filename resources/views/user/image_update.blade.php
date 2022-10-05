@extends('frontend.frontend_master')

@section('front_content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
    <div class="sign-in-page">
        <div class="row">
            <div class="col-md-4 mb-1">
              @include('user.inc.sidebar')
            </div>
            <div class="col-md-8 mt-1">
              <div class="card">
                <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your profile</h3>
                    <div class="card-body" style="padding-top:20px">
                        <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
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
	</div>
</div>
</div>



@endsection
{{-- 
@push('js')

@endpush --}}