<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Module; 
use App\Models\AssignModule;

class AssignModuleController extends Controller
{
    public function ViewAssignClass(){
      // $data['allData'] = AssignElement::all();
        $data['allData'] = AssignModule::select('semestre_id')->groupBy('semestre_id')->get();
    	return view('backend.setup.assign_class.view_assign_class',$data);
    }


     public function AddAssignClass(){
    	$data['semestres'] = Semestre::all();
    	$data['classes'] = Module::all();
    	return view('backend.setup.assign_class.add_assign_class',$data);
    }


	public function StoreAssignClass(Request $request){

	    	$subjectCount = count($request->module_id);
	    	if ($subjectCount !=NULL) {
	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$assign_class = new AssignModule();
	    			$assign_class->semestre_id = $request->semestre_id;
	    			$assign_class->module_id = $request->module_id[$i];
	    		//	$assign_class->full_mark = $request->full_mark[$i];
	    		//	$assign_class->pass_mark = $request->pass_mark[$i];
	    		//	$assign_class->subjective_mark = $request->subjective_mark[$i];
				//	$assign_class->coef_mark = $request->coef_mark[$i];
	    			$assign_class->save();

	    		} // End For Loop
	    	}// End If Condition

	    	$notification = array(
	    		'message' => 'Insertion réussie',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('assign.class.view')->with($notification);

	    }  // End Method 


	 public function EditAssignClass($semestre_id){
	    	$data['editData'] = AssignModule::where('semestre_id',$semestre_id)->orderBy('module_id','asc')->get();
	    	// dd($data['editData']->toArray());
	    $data['semestres'] = Semestre::all();
    	$data['classes'] = Module::all();
    	return view('backend.setup.assign_class.edit_assign_class',$data);

	    }


public function UpdateAssignClass(Request $request,$semestre_id){
    	if ($request->module_id == NULL) {
       
        $notification = array(
    		'message' => 'Desolé! Champ vide',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.class.edit',$semestre_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->module_id);
	AssignModule::where('semestre_id',$semestre_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_class = new AssignModule();
	    			$assign_class->semestre_id = $request->semestre_id;
	    			$assign_class->module_id = $request->module_id[$i];
	    			//$assign_class->full_mark = $request->full_mark[$i];
	    		//	$assign_class->pass_mark = $request->pass_mark[$i];
	    		//	$assign_class->subjective_mark = $request->subjective_mark[$i];
				//	$assign_class->coef_mark = $request->coef_mark[$i];
	    			$assign_class->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.class.view')->with($notification);
    } // end Method 


	public function DetailsAssignClass($semestre_id){
   $data['detailsData'] = AssignModule::where('semestre_id',$semestre_id)->orderBy('module_id','asc')->get();

   return view('backend.setup.assign_class.details_assign_class',$data);


 	}




}
 