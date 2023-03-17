<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annee;

class AnneeController extends Controller
{
    public function ViewShift(){
    	$data['allData'] = Annee::all();
    	return view('backend.setup.shift.view_shift',$data);

    }

	 public function StudentShiftAdd(){
		    	return view('backend.setup.shift.add_shift');
		    }


    public function StudentShiftStore(Request $request){

    	$validatedData = $request->validate([
    		'name' => 'required|unique:annees,name',
    		
    	]);

    	$data = new Annee();
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Insertion réussie',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.shift.view')->with($notification);

    }



	public function StudentShiftEdit($id){
		 $editData = Annee::find($id);
		  return view('backend.setup.shift.edit_shift',compact('editData'));

		    }

public function StudentShiftUpdate(Request $request,$id){

		$data = Annee::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:annees,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.shift.view')->with($notification);
    }


 public function StudentShiftDelete($id){
	    	$user = Annee::find($id);
	    	$user->delete();

	    	$notification = array(
	    		'message' => 'Suppression effectuée',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('student.shift.view')->with($notification);

	    }




}
