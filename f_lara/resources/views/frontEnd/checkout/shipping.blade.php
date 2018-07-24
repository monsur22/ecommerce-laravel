@extends('frontEnd.master') 
@section('mainContent')
<!-- register -->
	<div class="register">
		<div class="container">
			<div class="row">
	<div class="col-md-12">
			<h2>Dear {{ Session::get('customerName') }} Wellcome</h2>
			<div class="login-form-grids">
				<h5 class="text-center">Shipping Information is here</h5>
				{{Form::open(['route'=>'new-shiping','method'=>'POST'])}}
					<input type="text" value="{{$customer->firstName .' '. $customer->lastName}}" name="fullName" placeholder="First Name..." required=" " >
					
				    <input type="email" value="{{$customer->email_address}}" name="email_address" placeholder="Email Address" required=" " >
					
					<input type="text" value="{{$customer->phone_number}}" name="phone_number" placeholder="Phone Number" required=" " >
					<textarea type="text"  name="address" placeholder="address" >{{ $customer->address }}</textarea> 
					<input type="submit" name="btn" value="Save Shipping Info">
				{{Form::close()}}
			</div>
		</div>
			<!-- login -->
		
			
		</div>

</div>
</div>
		

@endsection