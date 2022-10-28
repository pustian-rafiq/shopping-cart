<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					<li><a href="#"><i class="icon fa fa-user"></i>{{ session()->get('language') === 'bangla' ? 'আমার প্রোফাইল' : 'My Account' }}</a></li>
					<li><a href="#"><i class="icon fa fa-heart"></i>{{ session()->get('language') === 'bangla' ? 'উইশলিস্ট' : 'Wishlist'}}</a></li>
					<li><a href="#"><i class="icon fa fa-shopping-cart"></i>{{ session()->get('language') === 'bangla' ?'আমার কার্ট' : 'My Cart'}}</a></li>
					<li><a href="#"><i class="icon fa fa-check"></i>{{ session()->get('language') === 'bangla' ?'চেকআউট' : 'Checkout'}}</a></li>
		 
						@auth
						<li><a href="{{ route('user.dashboard') }}" > </i>Dashboard</a> </li>
						 <li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a>
						 </li>
						 </a>
						 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						 </form>
						@else
						<li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>{{ session()->get('language') === 'bangla' ?' লগিন/রেজিস্টার' : '}Login/Register'}}</a></li>
						@endauth
						
			 
					
				</ul>
			</div><!-- /.cnt-account -->

			<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">USD</a></li>
							<li><a href="#">INR</a></li>
							<li><a href="#">GBP</a></li>
						</ul>
					</li>

					<li class="dropdown dropdown-small">
						<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
							@if (session()->get('language') === 'bangla')
							ভাষা পরিবর্তন করুন
							@else
							English </span><b class="caret"></b>
							@endif
							
						</a>
						<ul class="dropdown-menu">
							@if (session()->get('language') === 'bangla')
							<li><a href="{{ route('language.english') }}">English</a></li>
							@else	
							<li><a href="{{ route('language.bangla') }}">বাংলা</a></li>
							@endif
						</ul>
					</li>
				</ul><!-- /.list-unstyled -->
			</div><!-- /.cnt-cart -->
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->