<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use Mail;
use Session;
use App\Shipping;

class checkoutController extends Controller
{
   public function index(){
   	return view('frontEnd.checkout.checkout-content');
   }

   public function customerSingUp(Request $request){
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

}
