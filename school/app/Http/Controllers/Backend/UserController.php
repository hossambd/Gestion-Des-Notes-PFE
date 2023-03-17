<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
    //	$allData = User::all();
		//$data['allData'] = User::all();
    	$data['allData'] = User::where('rule','admin')->orwhere('rule','enseignant')->get();
    	return view('backend.user.view_user',$data);

    }


    public function UserAdd(){
    	return view('backend.user.add_user');
    }


    public function UserStore(Request $request){

    	$validatedData = $request->validate([
    		'email' => 'required|unique:users',
    		'name' => 'required',
    	]);

    	$data = new User();
        $code = rand(0000,9999);
    	$data->usertype = $request->rule;
        $data->rule = $request->rule;
    	$data->nomfr = $request->name;
    	$data->email = $request->email;
		$data->mobile = $request->mobile;
    	$data->password = bcrypt($code);
        $data->code = $code;
    	$data->save();

    	$notification = array(
    		'message' => 'Utilisateur bien inseré',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('user.view')->with($notification);

    }



    public function UserEdit($id){
    	$editData = User::find($id);
    	return view('backend.user.edit_user',compact('editData'));

    }



    public function UserUpdate(Request $request, $id){

    	$data = User::find($id);
    	$data->nomfr = $request->name;
    	$data->email = $request->email;
        $data->rule = $request->rule;
    	$data->save();

    	$notification = array(
    		'message' => 'Mise à jour utilisateur effectué',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view')->with($notification);

    }



    public function UserDelete($id){
    	$user = User::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Utilisateur bien supprimé',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view')->with($notification);

    }





}
 