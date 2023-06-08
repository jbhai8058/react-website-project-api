<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function onSelectAll(){
        $result = Information::all();
        return $result;
    } // end method


    public function AllInformation(){
    	$result = Information::all();
    	return view('backend.information.all_information',compact('result'));
    } // end method 



    public function AddInformation(){
    	return view('backend.information.add_information');
    } // end method 


    public function StoreInformation(Request $request){
      
       Information::insert([
       	'about' => $request->about,
       	'refund' => $request->refund,
       	'terms' => $request->terms,
       	'privacy' => $request->privacy,

       ]);
       $notification = array(
    		'message' => 'Information Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.information')->with($notification);

    } // end method 


    public function EditInformation($id){

    	$information = Information::findOrFail($id); 
    	return view('backend.information.edit_inforamtion',compact('information'));

    } // end method 


    public function UpdateInformation(Request $request, $id){

    	 Information::findOrFail($id)->update([
       	'about' => $request->about,
       	'refund' => $request->refund,
       	'terms' => $request->terms,
       	'privacy' => $request->privacy,

       ]);
       $notification = array(
    		'message' => 'Information Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('all.information')->with($notification);

    }// end method 



    public function DeleteInformation($id){

    	Information::findOrFail($id)->delete();
    	
    	$notification = array(
    		'message' => 'Information Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->back()->with($notification);

    } // end mehtod 

}
