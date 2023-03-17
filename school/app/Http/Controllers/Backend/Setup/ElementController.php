<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Element; 

class ElementController extends Controller
{
      public function ViewSubject(){
    	$data['allData'] = Element::all();
    	return view('backend.setup.school_subject.view_school_subject',$data);
 
    }


	public function SubjectAdd(){
    	return view('backend.setup.school_subject.add_school_subject');
    }

    public function SubjectStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:elements,name',
	    		
	    	]);

	    	$data = new Element();
	    	$data->name = $request->name;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Insertion reussie',
	    		'alert-type' => 'success'
	    	);

	    return redirect()->route('school.subject.view')->with($notification);

	    }


	    public function SubjectEdit($id){
	    	$editData = Element::find($id);
	    	return view('backend.setup.school_subject.edit_school_subject',compact('editData'));
	    }



	    public function SubjectUpdate(Request $request,$id){

	 $data = Element::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:elements,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('school.subject.view')->with($notification);
    }


     public function SubjectDelete($id){
	    	$user = Element::find($id);
	    	$user->delete();

	    	$notification = array(
	    		'message' => 'Suppression effectuée',
	    		'alert-type' => 'info'
	    	);

	   return redirect()->route('school.subject.view')->with($notification);

	    }




} 
