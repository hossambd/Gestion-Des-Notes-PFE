<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function ViewStudent(){
    	$data['allData'] = Module::all();
    	return view('backend.setup.student_class.view_class',$data);

    }


    public function StudentClassAdd(){
    	return view('backend.setup.student_class.add_class');
    }


    public function StudentClassStore(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:modules,name',
    		
    	]);

    	$data = new Module();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Ajout reussi',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.class.view')->with($notification);

    }



    public function StudentClassEdit($id){
    	$editData = Module::find($id);
    	return view('backend.setup.student_class.edit_class',compact('editData'));

    }


    public function StudentClassUpdate(Request $request,$id){

		$data = Module::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:modules,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Mise à jour reussie',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.class.view')->with($notification);
    }


    public function StudentClassDelete($id){
    	$user = Module::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'Suppression effectuée',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('student.class.view')->with($notification);

    }



}
