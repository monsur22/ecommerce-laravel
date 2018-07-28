<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/mon', function () {
    return view('mon');
});*/
Route::get('/','firstcontroller@index');
Route::get('/catagory','firstcontroller@catagory');
Route::get('/contact', 'firstcontroller@contact');
Route::get('/single/{id}', 'firstcontroller@single');



Auth::routes();

Route::get('/dashbord', 'HomeController@index')->name('home');


/*category info*/
Route::get('/category/add', 'categoryController@creatCategory');
Route::post('/category/save', 'categoryController@storeCategory');
Route::get('/category/manage', 'categoryController@manageCategory');
Route::get('/category/edit/{id}', 'categoryController@editCategory');
Route::post('/category/update', 'categoryController@updateCategory');
Route::get('/category/delete/{id}', 'categoryController@deleteCategory');
/*category info*/

//manufacturer info
Route::get('/manufacturer/add', 'manufacturerController@creatManufacturer');
Route::post('/manufacturer/save', 'manufacturerController@storeManufacturer');
Route::get('/manufacturer/manage', 'manufacturerController@manageManufacturer');
Route::get('/manufacturer/edit/{id}', 'manufacturerController@editManufacturer');
Route::post('/manufacturer/update', 'manufacturerController@updateManufacturer');
Route::get('/manufacturer/delete/{id}', 'manufacturerController@deleteManufacturer');
//manufacturer info

//Product info
Route::get('/product/add', 'productController@createProduct');
Route::post('/product/save', 'productController@storeProduct');
Route::get('/product/manage', 'productController@manageProduct');
Route::get('/product/view/{id}', 'productController@viewProduct');
Route::get('/product/edit/{id}', 'productController@editProduct');
Route::post('/product/update', 'productController@updateProduct');
Route::get('/product/delete/{id}', 'productController@deleteProduct');
//Product info

//add to cart
Route::post('/cart/add', [
	'uses'=>'cartController@addToCart',
	'as'=>'add-to-cart'

]);
Route::get('/cart/show', [
	'uses'=>'cartController@showCart',
	'as'=>'show-cart'

]);
Route::get('/cart/delete/{id}', [
	'uses'=>'cartController@deleteCart',
	'as'=>'delete-cart-item'

]);
Route::post('/cart/update', [
	'uses'=>'cartController@updateCart',
	'as'=>'update-cart'

]);

Route::get('/checkout', [
	'uses'=>'checkoutController@index',
	'as'=>'checkout'

]);
Route::post('/customer/registraion', [
	'uses'=>'checkoutController@customerSingUp',
	'as'=>'customer-sing-up'

]);
Route::get('/checkout/shipping', [
	'uses'=>'checkoutController@shippingForm',
	'as'=>'checkout-shipping'

]);
Route::get('/checkout/shipping', [
	'uses'=>'checkoutController@shippingForm',
	'as'=>'checkout-shipping'

]);
Route::post('/shipping/save', [
	'uses'=>'checkoutController@saveShipping',
	'as'=>'new-shiping'

]);
Route::get('/checkout/payment', [
	'uses'=>'checkoutController@paymentForm',
	'as'=>'checkout-payment'

]);
Route::post('/checkout/order', [
	'uses'=>'checkoutController@newOrder',
	'as'=>'new-order'

]);
Route::get('/complete/order', [
	'uses'=>'checkoutController@completeOrder',
	'as'=>'complete-order'

]);
Route::post('/checkout/csutomer-login', [
	'uses'=>'checkoutController@customerLogin',
	'as'=>'csutomer-login'

]);
Route::get('/checkout/csutomer-logout', [
	'uses'=>'checkoutController@customerLogout',
	'as'=>'csutomer-logout'

]);
Route::get('/checkout/new-cutomer-login', [
	'uses'=>'checkoutController@newcustomerLogin',
	'as'=>'new-cutomer-login'

]);