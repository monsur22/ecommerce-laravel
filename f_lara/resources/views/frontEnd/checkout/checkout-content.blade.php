@extends('frontEnd.master') 
@section('mainContent')
<!-- register -->
	<div class="register">
		<div class="container">
			<div class="row">
	<div class="col-md-6">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				{{Form::open(['route'=>'customer-sing-up','method'=>'POST'])}}
					<input type="text" name="firstName" placeholder="First Name..." required=" " >
					<input type="text"  name="lastName" placeholder="Last Name..." required=" " >
				    <input type="email" name="email_address" placeholder="Email Address" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<input type="text" name="phone_number" placeholder="Phone Number" required=" " >
					<textarea type="text" name="address" placeholder="address" ></textarea> 
					<input type="submit" name="btn" value="Register">
				{{Form::close()}}
			</div>
		</div>
			<!-- login -->
		<div class="col-md-6">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form>
					<input type="email" name="email_address" placeholder="Email Address" required=" " >
					<input type="password" name="password"  placeholder="Password" required=" " >
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
			
		</div>
	</div>
<!-- //login -->
</div>
		</div>
	</div>
<!-- //register -->
@endsection