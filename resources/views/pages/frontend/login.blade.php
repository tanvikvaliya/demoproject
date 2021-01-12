@extends('pages.frontend.layout.master')
@section('content')	
<title>Login</title>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{url('/user-login') }}">
						{{ csrf_field() }}
						<input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus />
						@if ($errors->has('email'))
  						<span class="help-block">
                  			<strong>{{ $errors->first('email') }}</strong>
              			</span>
          				@endif
						<input type="password" placeholder="Password" name="password" required />
						@if ($errors->has('password'))
                		<span class="help-block">
                    		<strong>{{ $errors->first('password') }}</strong>
                		</span>
            			@endif
						<span>
							<input type="checkbox" class="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
								Keep me signed in
						</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="POST" action="{{ route('register') }}">
						{{ csrf_field() }}
						<div class="{{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus/>
							@if ($errors->has('name'))
             				 <span class="help-block">
                  				<strong>{{ $errors->first('name') }}</strong>
             				 </span>
							  @endif
						</div>
						<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
							<input type="email" name="email"  placeholder="Email Address" value="{{ old('email') }}" required/>
							@if ($errors->has('email'))
              				<span class="help-block">
                  				<strong>{{ $errors->first('email') }}</strong>
            				</span>
        					@endif
						</div>
						<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="password" placeholder="Password" name="password" required/>
							@if ($errors->has('password'))
              				<span class="help-block">
                  				<strong>{{ $errors->first('password') }}</strong>
              				</span>
          					@endif
        				</div>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection