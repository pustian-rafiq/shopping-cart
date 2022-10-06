@extends('frontend.frontend_master')

@section('front_content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Update Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
        <div class="sign-in-page">
         <div class="row">
            <div class="col-md-4 ">
                @include('user.inc.sidebar')
            </div>
            <div class="col-md-8 mt-1">
              <div class="card">
                <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Password</h3>
                    <div class="card-body">
                        <form action="{{ route('store.password') }}" method="POST">
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
	</div>
</div>
</div>
@endsection
