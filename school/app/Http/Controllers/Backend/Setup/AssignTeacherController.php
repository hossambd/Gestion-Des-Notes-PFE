<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Semestre;
use App\Models\Annee;
use App\Models\User; 
use App\Models\AssignTeacher;

class AssignTeacherController extends Controller
{
    public function ViewAssignTeacher(){
      // $data['allData'] = AssignElement::all();
        $data['allData'] = AssignTeacher::select('teacher_id')->groupBy('teacher_id')->get();
    	return view('backend.setup.assign_teacher.view_assign_teacher',$data);
    }


     public function AddAssignTeacher(){
		$data['subjects'] = Element::all();
		$data['semestres'] = Semestre::all();
		$data['annees'] = Annee::all();
		$data['teachers'] = User::where('rule','enseignant')->get();
    	return view('backend.setup.assign_teacher.add_assign_teacher',$data);
    }


	public function StoreAssignTeacher(Request $request){

	    	$subjectCount = count($request->element_id);
	    	if ($subjectCount !=NULL) {
	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$assign_teacher = new AssignTeacher();
	    			$assign_teacher->teacher_id = $request->teacher_id;
					$assign_teacher->element_id = $request->element_id[$i];
					$assign_teacher->semestre_id = $request->semestre_id[$i];

					$assign_teacher->annee_id = $request->annee_id;
	    		//	$assign_subject->full_mark = $request->full_mark[$i];
	    		//	$assign_subject->pass_mark = $request->pass_mark[$i];
	    		//	$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_teacher->save();

	    		} // End For Loop
	    	}// End If Condition

	    	$notification = array(
	    		'message' => 'Insertion réussie',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('assign.teacher.view')->with($notification);

	    }  // End Method 


	 public function EditAssignTeacher($teacher_id){
	    	$data['editData'] = AssignTeacher::where('teacher_id',$teacher_id)->orderBy('element_id','asc')->get();
	    	// dd($data['editData']->toArray());
			$data['annees'] = Annee::all();
			$data['semestres'] = Semestre::all();

			$data['subjects'] = Element::all();
    	//$data['teachers'] = User::where('rule','enseignant')->get();
    	return view('backend.setup.assign_teacher.edit_assign_teacher',$data);

	    }


public function UpdateAssignTeacher(Request $request,$teacher_id){
    	if ($request->element_id == NULL) {
       
        $notification = array(
    		'message' => 'Desolé! Champ vide',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.teacher.edit',$teacher_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->element_id);
	AssignTeacher::where('teacher_id',$teacher_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_teacher = new AssignTeacher();
	    			$assign_teacher->teacher_id = $request->teacher_id;
	    			$assign_teacher->element_id = $request->element_id[$i];
					$assign_teacher->semestre_id = $request->semestre_id[$i];
					$assign_teacher->annee_id = $request->annee_id;
	    		//////	$assign_subject->full_mark = $request->full_mark[$i];
	    		//	$assign_subject->pass_mark = $request->pass_mark[$i];
	    		//	$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_teacher->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.teacher.view')->with($notification);
    } // end Method 


	public function DetailsAssignTeacher($teacher_id){
   $data['detailsData'] = AssignTeacher::where('teacher_id',$teacher_id)->orderBy('element_id','asc')->get();

   return view('backend.setup.assign_teacher.details_assign_teacher',$data);


 	}




}
 