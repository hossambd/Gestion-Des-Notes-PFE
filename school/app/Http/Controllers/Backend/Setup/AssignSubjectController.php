<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Semestre;
use App\Models\Module; 
use App\Models\AssignElement;
use App\Models\AssignModule;
class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
      // $data['allData'] = AssignElement::all();
        $data['allData'] = AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get();
    	return view('backend.setup.assign_subject.view_assign_subject',$data);
    }


     public function AddAssignSubject(){
    	$data['subjects'] = Element::all();
    	$data['classes'] = Module::all();
		$data['semestres'] = Semestre::all();
		return view('backend.setup.assign_subject.add_assign_subject',$data);
    }


	public function StoreAssignSubject(Request $request){

	    	$subjectCount = count($request->element_id);
	    	if ($subjectCount !=NULL) {

	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$assign_subject = new AssignElement();
                    $name= Element::select('name')->where('id',$request->element_id[$i])->get();
					//dd($name);
					$assign_subject->name = $name[0]["name"];

					$assign_subject->module_id = $request->module_id;
					$assign_subject->semestre_id = $request->semestre_id;

	    			$assign_subject->element_id = $request->element_id[$i];
	    			$assign_subject->full_mark = $request->full_mark[$i];
	    			$assign_subject->pass_mark = $request->pass_mark[$i];
	    			$assign_subject->subjective_mark = $request->subjective_mark[$i];
					$assign_subject->coef_mark = $request->coef_mark[$i];
	    			$assign_subject->save();

	    		} // End For Loop
	    	}// End If Condition

	    	$notification = array(
	    		'message' => 'Insertion réussie',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('assign.subject.view')->with($notification);

	    }  // End Method 


	 public function EditAssignSubject($module_id){
	    	$data['editData'] = AssignElement::where('module_id',$module_id)->orderBy('element_id','asc')->get();
	    	// dd($data['editData']->toArray());
		//	dd($data['editData'][0]['semestre_id']);
	    $data['subjects'] = Element::all();
    	$data['classes'] = Module::all();
		$data['semestres'] = Semestre::all();
    	return view('backend.setup.assign_subject.edit_assign_subject',$data);

	    }


public function UpdateAssignSubject(Request $request,$module_id){
    	if ($request->element_id == NULL) {
       
        $notification = array(
    		'message' => 'Desolé! Champ vide',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.subject.edit',$module_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->element_id);
	AssignElement::where('module_id',$module_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_subject = new AssignElement();
				    $element_name = Element::select('name')->where('id',$request->element_id[$i])->get();
	    			//dd($element_name[0]['name']);
					$assign_subject->name = $element_name[0]['name'];
					$assign_subject->semestre_id = $request->semestre_id;
					$assign_subject->module_id = $request->module_id;
	    			$assign_subject->element_id = $request->element_id[$i];
	    			$assign_subject->full_mark = $request->full_mark[$i];
	    			$assign_subject->pass_mark = $request->pass_mark[$i];
	    			$assign_subject->subjective_mark = $request->subjective_mark[$i];
					$assign_subject->coef_mark = $request->coef_mark[$i];
	    			$assign_subject->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.subject.view')->with($notification);
    } // end Method 


	public function DetailsAssignSubject($module_id){
   $data['detailsData'] = AssignElement::where('module_id',$module_id)->orderBy('element_id','asc')->get();

   return view('backend.setup.assign_subject.details_assign_subject',$data);


 	}




}
 