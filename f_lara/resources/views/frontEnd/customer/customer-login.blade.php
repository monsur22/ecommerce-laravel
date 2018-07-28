@extends('frontEnd.master') 
@section('mainContent')

			<!-- login -->
			<div class="register">
		<div class="container">
			<div class="row">
		<div class="col-md-12">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<h4 class="text-danger text-center">{{ Session::get('message') }}</h4><br/>
				{{Form::open(['route'=>'csutomer-login','method'=>'POST'])}}

					<input type="email" name="email_address" placeholder="Email Address" required=" " >
					<input type="password" name="password"  placeholder="Password" required=" " >
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				{{Form::close()}}
			</div>
		</div>
			
		</div>
	</div>
</div>

<!-- //login -->

<!-- //register -->
@endsection