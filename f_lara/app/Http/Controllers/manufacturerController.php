<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class manufacturerController extends Controller
{
    public function creatManufacturer(){
    	return view('admin.manufacturer.createManufacturer');
    }

    public function storeManufacturer(Request $request){

        $this->validate($request,['manufacturerName'=>'required','manufacturerDescription'=>'required']);
    	//return $request->all(); 
    	/*
$Manufacturer=new Manufacturer();
$Manufacturer->ManufacturerName=$request->ManufacturerName;
$Manufacturer->ManufacturerDescription=$request->ManufacturerDescription;
$Manufacturer->publicationStatus=$request->publicationStatus;
$Manufacturer->save();
return'Manufacturer infor save successfully';


*/
/*
Manufacturer::create($request->all());

return'Manufacturer infor save successfully';
*/

DB::table('manufacturers')->insert([
'manufacturerName'=>$request->manufacturerName,
'manufacturerDescription'=>$request->manufacturerDescription,
'publicationStatus'=>$request->publicationStatus,
]);

//return'Manufacturer infor save successfully';
return redirect('/manufacturer/add')->with('message','Manufacturer info save successfully');
    }

    public function manageManufacturer(){
$manufacturers=Manufacturer::all();
    	return view('admin.manufacturer.manageManufacturer',['manufacturers'=>$manufacturers]);
    }

    public function editManufacturer($id){

//return $id;
        $manufacturerById=Manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
    }
    public function updateManufacturer(Request $request){
       // dd($request->all());
        $Manufacturer= Manufacturer::find($request->manufacturerId);
$Manufacturer->manufacturerName=$request->manufacturerName;
$Manufacturer->manufacturerDescription=$request->manufacturerDescription;
$Manufacturer->publicationStatus=$request->publicationStatus;
$Manufacturer->save();
return redirect('/manufacturer/manage')->with('message','Manufacturer info update successfully');


    }
    public function deleteManufacturer($id){
       // dd($request->all());
        $Manufacturer= Manufacturer::find($id);

        $Manufacturer->delete();
return redirect('/manufacturer/manage')->with('message','Manufacturer info delete successfully');


    }
}
