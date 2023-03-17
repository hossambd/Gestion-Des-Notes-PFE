<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
//use App\Models\DiscountStudent;

use App\Models\Semestre;
use App\Models\Module;
use App\Models\Element;
use App\Models\Groupe;
use App\Models\Annee;
use DB;
use PDF;

use App\Models\StudentMarks;
use App\Models\ExamType;
 
class MarksController extends Controller
{

    public function MarksAdd(){
		
		$data['semestres'] = Semestre::all();
		$data['annees'] = Annee::all();
		$data['modules'] = Module::all();
		//$data['elements'] = Element::all();
    	$data['exam_types'] = ExamType::all();

    	return view('backend.marks.marks_add',$data);

    }


    public function MarksStore(Request $request){

    	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
			$data = New StudentMarks();
			$data->annee_id = $request->annee_id;
    		$data->semestre_id = $request->semestre_id;
    		$data->module_id = $request->module_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->cne = $request->cne[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Insertion reussie',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

    }// end method



    public function MarksEdit(){
		$data['annees'] = Annee::all();
		$data['semestres'] = Semestre::all();
		$data['elements'] = Element::all();
    	$data['modules'] = Module::all();
    	$data['exam_types'] = ExamType::all();

    	return view('backend.marks.marks_edit',$data);
    }


    public function MarksEditGetStudents(Request $request){
		$annee_id = $request->annee_id;
		$semestre_id = $request->semestre_id;
    //	$module_id = $request->module_id;
    	$assign_subject_id = $request->assign_subject_id;
    	$exam_type_id = $request->exam_type_id;

    	$getStudent = StudentMarks::with(['student'])->where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
    	//$getModule = StudentMarks::with(['module'])->where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();

    	return response()->json($getStudent);

    }


    public function MarksUpdate(Request $request){

	$StudentMarks=StudentMarks::where('annee_id',$request->annee_id)->where('semestre_id',$request->semestre_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->where('exam_type_id',$request->exam_type_id)->delete();

	//StudentMarks::where('annee_id',$request->annee_id)->where('semestre_id',$request->semestre_id)->where('module_id',1)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();

        $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
				$data = New StudentMarks();
				$data->annee_id = $request->annee_id;
				$data->semestre_id = $request->semestre_id;
				$data->module_id = $request->module_id;
				$data->assign_subject_id = $request->assign_subject_id;
				$data->exam_type_id = $request->exam_type_id;
				$data->student_id = $request->student_id[$i];
				$data->cne = $request->cne[$i];
				$data->marks = $request->marks[$i];
				$data->save();
	

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Mise à jour effectuée',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);


    } // end marks







}
 