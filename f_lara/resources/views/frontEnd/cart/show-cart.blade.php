@extends('frontEnd.master') 
@section('mainContent')

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span>3 Products</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Image</th>
							
							<th>Product Name</th>
						     <th>Quality</th>
							<th>Price</th>
							<th>Total Price</th>
							<th>Action</th>
						</tr>
					</thead>
					@php($i=1)
					@php($sum=0)
					@foreach($cartProducts as $cartProduct)
					<tr class="rem1">
						<td class="invert">{{ $i++ }}</td>
						<td class="invert-image"><img src="{{ asset($cartProduct->options->image) }}" alt="" height="50" width="50" />  </td>
						<td class="invert">{{ $cartProduct->name }}</td>
						<td class="invert">
							{{ Form::open(['route'=>'update-cart','method'=>'post']) }}
						<input type="number" name="qty" value="{{ $cartProduct->qty }}" min="1"/>
						<input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}" min="1"/>
						<input type="submit" name="btn" value="update"/>
						{{ Form::close() }}
					</td>

						
						<td class="invert">{{ $cartProduct->price }}</td>
						<td class="invert">{{$total=$cartProduct-> price*$cartProduct->qty }}</td>
						<td>
							<a href="{{ route('delete-cart-item',['rowId'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs" title="Delete">
								<span class="glyphicon glyphicon-trash"></span>
							
							
						</td>
					</tr>
				<?php $sum = $sum + $total; ?>
			@endforeach
							
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<li>Product Price<i></i> <span>{{ $sum }} </span></li>
						<li>Vat <i></i> <span>{{ $vat=0 }}</span></li>
						<li>Shipping cost <i></i> <span>{{ $charg=0 }} </span></li>
						<li>Total <i></i> <span>{{$orderTotal = $sum + $vat+$charg }}</span></li>
						<?php 
							Session::put('orderTotal',$orderTotal);
						?>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-11 col-md-offset-1">
						@if(Session::get('customerId')&&Session::get('shippingId'))
						<a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">CheckOut</a>
						@elseif(Session::get('customerId'))
						<a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">CheckOut</a>
						@else
						<a href="{{ route('checkout') }}" class="btn btn-success pull-right">CheckOut</a>

						@endif
						<a href="" class="btn btn-success">Continue Shopping</a>
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //checkout -->
@endsection