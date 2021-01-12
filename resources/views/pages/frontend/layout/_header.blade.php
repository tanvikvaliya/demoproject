<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="logo pull-left">
						<a href="{{url('index')}}"><img src="{{ asset('images/frontend/home/logo.png') }}" alt="" /></a>
					</div>
				<div class="col-sm-2.5 pull-right">
					<input class="form-control" type="text" placeholder="Search" aria-label="Search">
				</div>
			<div class="col-sm-8">
				<div class="shop-menu pull-right">
					<ul class="nav navbar-nav">
						<li><a href="{{url('contact-us')}}"><i class="fa fa-phone"></i> Contact Us</a></li>
						<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
						<li><a href="{{url('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
						<li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
						@if(!empty(Auth::user()->username))
						<li><a href="{{ url('user-logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a></li>
						@else
						<li><a href="{{url('user-login')}}" class="active"><i class="fa fa-lock"></i> Login </a></li>
						@endif
					</ul>
					<form id="logout-form" action="{{ url('user-logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
      				</form>
					</div>
				</div>
			</div>
		</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->