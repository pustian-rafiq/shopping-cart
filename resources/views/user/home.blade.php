@extends('frontend.frontend_master')

@section('front_content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Dashboard</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
    <div class="sign-in-page">
        <div class="row">
            <div class="col-md-4 ">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top"  style="border-radius: 50%;" src="{{ (!empty(Auth::user()->image)) ? asset(Auth::user()->image) : url('frontend/media/default.png') }}" height="100%;" width="100%;" alt="Card image cap">
                    <ul class="list-group list-group-flush">
                      <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block " >Home</a>
                      <a href="" class="btn btn-primary btn-sm btn-block">My Orders</a>
                      <a href="" class="btn btn-primary btn-sm btn-block">Return Orders</a>
                      <a href="" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
                      <a href="" class="btn btn-primary btn-sm btn-block">Update Image</a>
                      <a href="" class="btn btn-primary btn-sm btn-block">Update Password</a>
                      <a href="" class="btn btn-primary btn-sm btn-block">Chats</a>
                      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Log Out</a>
                    </ul>
                  </div>
            </div>
            <div class="col-md-8 mt-1">
              <div class="card">
                <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your profile</h3>
                    <div class="card-body">
                        <form action="" method="POST">
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
          </div>
	</div>
</div>
</div>
@endsection
