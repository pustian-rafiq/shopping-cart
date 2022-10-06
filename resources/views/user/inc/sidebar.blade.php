<div class="card" style="width: 18rem;">
    {{-- <img class="card-img-top"  style="border-radius: 50%;" src="{{ (!empty(Auth::user()->photo)) ? asset(Auth::user()->photo) : url('frontend/media/default.png') }}" height="100%;" width="100%;" alt="Card image cap"> --}}
    <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->photo) }}" height="100%;" width="100%;" alt="Card image cap">
    <ul class="list-group list-group-flush mt" style="margin-top:10px">
      <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block " >Home</a>
      <a href="" class="btn btn-primary btn-sm btn-block">My Orders</a>
      <a href="" class="btn btn-primary btn-sm btn-block">Return Orders</a>
      <a href="" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
      <a href="{{ route('update.image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>
      <a href="{{ route('update.password') }}" class="btn btn-primary btn-sm btn-block">Update Password</a>
      <a href="" class="btn btn-primary btn-sm btn-block">Chats</a>
      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"> Log Out</a>
    </ul>
  </div>