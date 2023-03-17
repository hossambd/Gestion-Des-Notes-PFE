<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\User; 
use App\Models\AssignStudent;
use App\Models\Semestre;
use App\Models\Module;
use DB;
use PDF;
class AssignStudentController extends Controller
{
    public function ViewAssignStudent(){
      // $data['allData'] = AssignElement::all();
        $data['allData'] = AssignStudent::select('student_id')->groupBy('student_id')->get();
		$data['semestres'] = Semestre::all();
    	$data['classes'] = Module::all();
    	return view('backend.setup.assign_student.view_assign_student',$data);
    }
    public function StudentGet(Request $request){

    	$id_no = $request->id_no;

    	$singleStudent = User::where('id_no',$id_no)->where('module_id',$module_id)->where('exam_type_id',$exam_type_id)->first();

    if ($singleStudent == true) {
    	$data['allData'] = StudentMarks::select('semestre_id','module_id','exam_type_id','student_id')->where('semestre_id',$semestre_id)->where('module_id',$module_id)->where('exam_type_id',$exam_type_id)->groupBy('semestre_id')->groupBy('module_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
    	// dd($data['allData']->toArray());

    $pdf = PDF::loadView('backend.report.student_result.student_result_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
      }
    } // end Method 


     public function AddAssignStudent(){
    	$data['subjects'] = Element::all();
    	//$data['etudiants'] = User::where('rule','etudiant')->get();
		$data['semestres'] = Semestre::all();
		$data['classes'] = Module::all();
    	return view('backend.setup.assign_student.add_assign_student',$data);
    }


	public function StoreAssignStudent(Request $request){

	    	$subjectCount = count($request->element_id);
	    	if ($subjectCount !=NULL) {
	    		for ($i=0; $i <$subjectCount ; $i++) { 
	    			$assign_student = new AssignStudent();
	    			$assign_student->student_id = $request->student_id;
	    			$assign_student->element_id = $request->element_id[$i];
	    		//	$assign_subject->full_mark = $request->full_mark[$i];
	    		//	$assign_subject->pass_mark = $request->pass_mark[$i];
	    		//	$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_student->save();

	    		} // End For Loop
	    	}// End If Condition

	    	$notification = array(
	    		'message' => 'Insertion réussie',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('assign.student.view')->with($notification);

	    }  // End Method 


	 public function EditAssignStudent($student_id){
	    $data['editData'] = AssignStudent::where('student_id',$student_id)->orderBy('element_id','asc')->get();
	    	// dd($data['editData']->toArray());
	    $data['subjects'] = Element::all();
    //	$data['students'] = User::where('rule','student')->get();
		$data['semestres'] = Semestre::all();
    	$data['classes'] = Module::all();
    	return view('backend.setup.assign_student.edit_assign_student',$data);

	    }

    public function MarksEditGetStudents(Request $request){
    	$semestre_id = $request->semestre_id;
    	$module_id = $request->module_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_type_id = $request->exam_type_id;

    	$getStudent = StudentMarks::with(['student'])->where('semestre_id',$semestre_id)->where('module_id',$module_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();

    	return response()->json($getStudent);

    }

public function UpdateAssignStudent(Request $request,$student_id){
    	if ($request->element_id == NULL) {
       
        $notification = array(
    		'message' => 'Desolé! Champ vide',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.student.edit',$student_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->element_id);
	AssignStudent::where('student_id',$student_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_student = new AssignStudent();
	    			$assign_student->student_id = $request->student_id;
	    			$assign_student->element_id = $request->element_id[$i];
	    		//////	$assign_subject->full_mark = $request->full_mark[$i];
	    		//	$assign_subject->pass_mark = $request->pass_mark[$i];
	    		//	$assign_subject->subjective_mark = $request->subjective_mark[$i];
	    			$assign_student->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.student.view')->with($notification);
    } // end Method 


	public function DetailsAssignStudent($student_id){
   $data['detailsData'] = AssignStudent::where('student_id',$student_id)->orderBy('element_id','asc')->get();

   return view('backend.setup.assign_student.details_assign_student',$data);


 	}




}
 