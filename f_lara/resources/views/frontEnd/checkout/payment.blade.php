@extends('frontEnd.master') 
@section('mainContent')
<!-- register -->
	<div class="register">
		<div class="container">
			<div class="row">
	<div class="col-md-12">
			<h2>Dear {{ Session::get('customerName') }} Wellcome</h2>
			<div class="login-form-grids">
				<h5 class="text-center">Payment Form</h5>
				<div class="col-md-8 col-md-offset-2 well">
					{{ Form::open() }}
					<table class="table table-bordered" >
						<tr>
							<th>Cash On Delivery </th>
								<td><input type="radio" name="payment-type" value="Cash">Cash On Delivery </td>
							
						</tr>
						<tr>
							<th>Paypal</th>
								<td><input type="radio" name="payment-type" value="Paypal">Paypal</td>
							
						</tr>
						<tr>
							<th>B-kash</th>
								<td><input type="radio" name="payment-type" value="Bkash">B-kash</td>
							
						</tr>
						<tr>
							<th></th>
								<td><input type="submit" name="btn" value="Confirm Order"></td>
							
						</tr>
					</table>
					{{ Form::close() }}
				</div>
				
			</div>
		</div>
			<!-- login -->
		
			
		</div>

</div>
</div>
		

@endsection