<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class firstcontroller extends Controller
{
    public function index(){
        $publishedProducts = Product::where('publicationStatus',1)->get();
    	return view('frontEnd.home.homeContant',['publishedProducts'=>$publishedProducts]);
    }

    public function catagory(){
    	return view('frontEnd.catagory.catagoryContent');
    }

    public function contact(){
    	return view('frontEnd.catagory.contact');
    }

    public function single($id){

        $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
//               
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $id)
                ->first();
        return view('frontEnd.catagory.single', ['product'=>$productById]);


    	//return view('frontEnd.catagory.single');
    }
}
