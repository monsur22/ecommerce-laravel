<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class categoryController extends Controller
{
    public function creatCategory(){
    	return view('admin.category.createCategory');
    }

    public function storeCategory(Request $request){

        $this->validate($request,['categoryName'=>'required','categoryDescription'=>'required']);
    	//return $request->all(); 
    	/*
$category=new Category();
$category->categoryName=$request->categoryName;
$category->categoryDescription=$request->categoryDescription;
$category->publicationStatus=$request->publicationStatus;
$category->save();
return'Category infor save successfully';


*/
/*
Category::create($request->all());

return'Category infor save successfully';
*/

DB::table('categories')->insert([
'categoryName'=>$request->categoryName,
'categoryDescription'=>$request->categoryDescription,
'publicationStatus'=>$request->publicationStatus,
]);

//return'Category infor save successfully';
return redirect('/category/add')->with('message','category info save successfully');
    }

    public function manageCategory(){
$categories=Category::all();
    	return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function editCategory($id){

//return $id;
        $categoryById=Category::where('id',$id)->first();
        return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }
    public function updateCategory(Request $request){
       // dd($request->all());
        $category= Category::find($request->categoryId);
$category->categoryName=$request->categoryName;
$category->categoryDescription=$request->categoryDescription;
$category->publicationStatus=$request->publicationStatus;
$category->save();
return redirect('/category/manage')->with('message','category info update successfully');


    }
    public function deleteCategory($id){
       // dd($request->all());
        $category= Category::find($id);

        $category->delete();
return redirect('/category/manage')->with('message','category info delete successfully');


    }
}
