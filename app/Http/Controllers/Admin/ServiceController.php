<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;

class ServiceController extends Controller
{
    public function ServiceView(){
        $sevice = Service::latest()->get();
        return $sevice;
    } // end method

    public function AllService(){
    	$service = Service::all();
    	return view('backend.service.all_service',compact('service'));
    } // end method 


    public function AddService(){

    	return view('backend.service.add_service');

    } // end method 



    public function StoreService(Request $request){

    	$request->validate([
    		'service_name' => 'required',
    		'service_description' => 'required',
    		'service_logo' => 'required',
    	],[
			'service_name.required' => 'Input Service Name',
			'service_description.required' => 'Input Service Description',

    	]);

    	$image = $request->file('service_logo'); 
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(512,512)->save('upload/service/'.$name_gen);
    	$save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

    	Service::insert([
    		'service_name' => $request->service_name,
    		'service_discription' => $request->service_description,
    		'service_logo' => $save_url,
    	]);

    	 $notification = array(
    		'message' => 'Service Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.services')->with($notification);

    } // end method 



    public function EditService($id){

    	$services = Service::findOrFail($id);
    	return view('backend.service.edit_service',compact('services'));

    } // end method 


    public function UpdateService(Request $request){

    	$service_id = $request->id;

    	if ($request->file('service_logo')) {

    		$image = $request->file('service_logo'); 
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(512,512)->save('upload/service/'.$name_gen);
    	$save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

    	Service::findOrFail($service_id)->update([

    		'service_name' => $request->service_name,
    		'service_discription' => $request->service_description,
    		'service_logo' => $save_url,
    	]);

    	 $notification = array(
    		'message' => 'Service Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.services')->with($notification);
    		 

    	}else{

    		Service::findOrFail($service_id)->update([

    		'service_name' => $request->service_name,
    		'service_discription' => $request->service_description,
    		 
    	]);

    	 $notification = array(
    		'message' => 'Service Updated Without Image Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('all.services')->with($notification);
    	}


    } // end method 


    public function DeleteService($id){

    	Service::findOrFail($id)->delete();

    	$notification = array(
    		'message' => 'Service Delected Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

    } // end mehtod 
}
