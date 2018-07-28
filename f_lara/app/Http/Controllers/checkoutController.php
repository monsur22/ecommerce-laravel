<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use Mail;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;

class checkoutController extends Controller
{
   public function index(){
   	return view('frontEnd.checkout.checkout-content');
   }

   public function customerSingUp(Request $request){
   	$this->validate($request,['email_address'=>'email|unique:customers,email_address']);

   	$customer = new Customer();
   	$customer->firstName=$request->firstName;
   	$customer->lastName=$request->lastName;
   	$customer->email_address=$request->email_address;
   	$customer->password=bcrypt($request->password);
   	$customer->phone_number=$request->phone_number;
   	$customer->address=$request->address;
	$customer->save();

   	$customerId=$customer->id;
	Session::put('customerId',$customerId);
	Session::put('customerName',$customer->firstName .' '. $customer->lastName);
	$data=$customer->toArray();

	Mail::send('frontEnd.mails.confirmation-mail',$data,function ($message) use ($data){
		$message-> to($data['email_address']);
		$message-> subject('confirmation mail');
	});



	
	return redirect('/checkout/shipping');


   }
   public function shippingForm(){
   	$customer=Customer::find(Session::get('customerId'));

   	return view('frontEnd.checkout.shipping',['customer'=>$customer]);
   }
   public function saveShipping(Request $request){
   	$shipping=new Shipping();
   	$shipping->fullName=$request->fullName;
   	$shipping->email_address=$request->email_address;
   	$shipping->phone_number=$request->phone_number;
   	$shipping->address=$request->address;
   	$shipping->save();


   	Session::put('shippingId',$shipping->id);
   	return redirect('/checkout/payment');

   }
   public function paymentForm(){
   	return view('frontEnd.checkout.payment');

   }
   public function newOrder(Request $request){



   	//return $request->all();
   	$paymentType = $request->payment_type;

   	if($paymentType=='Cash'){
   		$order = new Order();
   		$order->customer_id=Session::get('customerId');
   		$order->shopping_id=Session::get('shippingId');
   		$order->order_total=Session::get('orderTotal');
   		$order->save();


   		$payment = new Payment();
   		$payment->order_id=$order->id;
   		$payment->payment_type=$paymentType;
   		$payment->save();


   		$cartProducts=Cart::content();
   		foreach ($cartProducts as $cartProduct) {
   			$orderDetail = new OrderDetail();
   			$orderDetail->order_id=$order->id;
   			$orderDetail->product_id=$cartProduct->id;
   			$orderDetail->product_name=$cartProduct->name;
   			$orderDetail->product_price=$cartProduct->price;
   			$orderDetail->product_quantity=$cartProduct->qty;
   			$orderDetail->save();

   		}
   		Cart::destroy();

   		return redirect('/complete/order');







   	}
   	else if($paymentType=='Paypal'){

   	}
   	else if($paymentType=='Bkash'){
   		
   	}





  }
  public function completeOrder(){
  	return 'success';

  }
  public function customerLogin(Request $request){
		$customer=Customer::where('email_address',$request->email_address)->first();
		if (password_verify($request->password, $customer->password)) {
			$customerId=$customer->id;
		   Session::put('customerId',$customerId);
		   Session::put('customerName',$customer->firstName .' '. $customer->lastName);

		   return redirect('/checkout/shipping');
		} else {
		    return redirect('/checkout')->with('message','Password Invalid');
		}


  }

  public function customerLogout(){
  	Session::forget('customerId');
  	Session::forget('customerName');
  	return redirect('/');



  }
  public function newcustomerLogin(){
  	return view('frontEnd.customer.customer-login');

  }


}

