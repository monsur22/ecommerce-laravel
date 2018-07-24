<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class cartController extends Controller
{
    public function addToCart(Request $request){

$product=Product::find($request->id);
Cart::add([

'id'=>$request->id,
'name'=>$product->productName,
'price'=>$product->productPrice,
'qty'=>$request->qty,
'options' => [

'image' => $product->productImage

]

]);




return redirect('/cart/show');
    }
    public function showCart(){

    	$cartProducts=Cart::content();
    	
    	return view('frontEnd.cart.show-cart',['cartProducts'=>$cartProducts]);


    }


    public function deleteCart($id){
    	Cart::remove($id);
    	return redirect('/cart/show');
    }
    public function updateCart(Request $request){

        Cart::update($request->rowId,$request->qty);
        return redirect('/cart/show');
    }
}
