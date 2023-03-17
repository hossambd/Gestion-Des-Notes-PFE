<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groupe;

class GroupeController extends Controller
{
    public function ViewGroup(){
    	$data['allData'] = Groupe::all();
    	return view('backend.setup.group.view_group',$data);

    }

	 public function StudentGroupAdd(){
	    	return view('backend.setup.group.add_group');
	    }


    public function StudentGroupStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:groupes,name',
	    		
	    	]);

	    	$data = new Groupe();
	    	$data->name = $request->name;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Student Group Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('student.group.view')->with($notification);

	    }


	public function StudentGroupEdit($id){
		 $editData = Groupe::find($id);
		  return view('backend.setup.group.edit_group',compact('editData'));

		    }



 public function StudentGroupUpdate(Request $request,$id){

		$data = Groupe::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:groupes,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Groupe bien modifié',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.group.view')->with($notification);
    }


 public function StudentGroupDelete($id){
	    	$user = StudentGroup::find($id);
	    	$user->delete();

	    	$notification = array(
	    		'message' => 'Student Group Deleted Successfully',
	    		'alert-type' => 'info'
	    	);

	    	return redirect()->route('student.group.view')->with($notification);

	    }



}
