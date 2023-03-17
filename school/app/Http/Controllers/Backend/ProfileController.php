<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Element;
use App\Models\Module; 
use App\Models\Semestre;
use App\Models\Annee; 
use App\Models\AssignTeacher;
use App\Models\AssignStudent;
use App\Models\AssignElement;
use App\Models\AssignModule;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
		$data['detailsData'] = AssignTeacher::where('teacher_id',$id)->with('school_subject')->orderBy('element_id','asc')->get();


		//		$name= Element::select('name')->where('id',$request->element_id)->get();

		//$data['details'] =Semestre::with('subjects')->get();
	  //dd($data['detailsData'] );
	   /* $data['classes']=Module::with(subjects)->where('' 
		/*	$data ['detailsData']= DB::table('assign_teachers as at')->select('at.*','ss.name', 'sc.name')
        ->join('elements as ss','at.element_id','=','ss.id')
		->join('modules as sc','ss.id','=','sc.id')
		->get();*/
		//$data['details2']=AssignElement::
		return view('backend.user.view_profile',compact('user'),$data);
    }
//Student -->teacher
public function StudentClassYearWise(Request $request){
	$data['annees'] = Annee::all();
	$data['semestres'] = Semestre::all();
	$data['modules'] = Module::all();
	$data['elements'] = Element::all();

	$data['annee_id'] = $request->annee_id;
	$data['semestre_id'] = $request->semestre_id;
	//$data['module_id'] = $request->module_id;
	//$data['element_id'] = $request->element_id;
	
	
	$data['allData'] = AssignStudent::where('annee_id',$request->annee_id)->where('semestre_id',$request->semestre_id)->get()->unique('student_id');
	//dd($data['allData']);
	return view('backend.user.student_teacher_view',$data);

} 

//
    public function ProfileEdit(){
    	$id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.user.edit_profile',compact('editData'));
    }


    public function ProfileStore(Request $request){

    	$data = User::find(Auth::user()->id);
    	$data->nomfr = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->adress = $request->adress;
    	$data->cin = $request->cin;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/user_images/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['image'] = $filename;
			
			
    	}
    	$data->save();

    	$notification = array(
    		'message' => 'Mise à jour réussie',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('profile.view')->with($notification);

    } // End Method 


 
 	public function PasswordView(){
 		return view('backend.user.edit_password');
 	}



 	public function PasswordUpdate(Request $request){
 		$validatedData = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed',
    	]);


    	$hashedPassword = Auth::user()->password;
    	if (Hash::check($request->oldpassword,$hashedPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login');
    	}else{
    		return redirect()->back();
    	}


 	} // End Metod 







}
 