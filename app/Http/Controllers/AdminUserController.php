<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function AdminLogout(){
    	FacadesAuth::logout();
    	return Redirect()->route('login');

    } // end mehtod 


    public function UserProfile(){
    	$id = FacadesAuth::user()->id;
    	$user = User::find($id);

    	return view('backend.user.user_profile',compact('user'));

    } // end mehtod 


    public function UserProfileEdit(){
    	$id = FacadesAuth::user()->id;
    	$user = User::find($id);

    	return view('backend.user.user_profile_edit',compact('user'));

    } // end mehtod 



    public function UserProfileStore(Request $request){

    	$data = User::find(FacadesAuth::user()->id);
    	$data->name = $request->name;
    	$data->email = $request->email;

    	if ($request->file('profile_photo_path')) {
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['profile_photo_path'] = $filename;
    	}
    	$data->save();

    	$notification = array(
    		'message' => 'User Profile Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('user.profile')->with($notification);

    } // end mehtod 


    public function UserChangePassword(){
    	$id = FacadesAuth::user()->id;
    	$user = User::find($id);
    	return view('backend.user.change_password',compact('user'));


    }  // end method 



    public function UserPasswordUpdate(Request $request){

    	$validateData = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed'

    	]);

    	$hashedPassword = FacadesAuth::user()->password;
    	if (Hash::check($request->oldpassword,$hashedPassword)) {
    		$user = User::find(FacadesAuth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();

    		FacadesAuth::logout();
    		return redirect()->route('admin.logout');
    	}else{
    		return redirect()->back();
    	}

    } // end mehtod 

}
 