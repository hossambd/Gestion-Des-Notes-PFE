<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AssignTeacher;
use App\Models\User;
//use App\Models\DiscountStudent;
use Auth;
use App\Models\Semestre;
use App\Models\Element;
use App\Models\Module;
use App\Models\Groupe;
use App\Models\Annee;
use DB;
use PDF;
use App\Models\AssignModule;
use App\Models\AssignElement;
use App\Models\StudentMarks;
use App\Models\ExamType;

class DefaultController extends Controller
{
	public function GetClass(Request $request){
    	$semestre_id = $request->semestre_id;
    	$allData = AssignModule::with(['module'])->where('semestre_id',$semestre_id)->get();
    	return response()->json($allData);

    }
    public function GetSubject(Request $request){
    	$semestre_id = $request->semestre_id;
		//$module_id = $request->module_id;
		//$allData = AssignElement::with(['school_subject'])->where('module_id',$module_id)->get();
		if(Auth::user()->rule == 'admin')
		$allData = AssignElement::with(['element'])->where('semestre_id',$semestre_id)->get();
		else
		$allData = AssignTeacher::with(['element'])->where('teacher_id',Auth::user()->id)->where('semestre_id',$semestre_id)->get();
    	return response()->json($allData);

    }
	public function GetSubjectTeacher(Request $request){
    	$semestre_id = $request->semestre_id;
		//$module_id = $request->module_id;
		//$allData = AssignElement::with(['school_subject'])->where('module_id',$module_id)->get();
		$allData = AssignTeacher::with(['element'])->where('semestre_id',$semestre_id)->get();
    	return response()->json($allData);

    }


    public function GetStudents(Request $request){
		$annee_id = $request->annee_id;
		$semestre_id = $request->semestre_id;
		$exam_type_id = $request->exam_type_id;
    //	$module_id = $request->module_id;
		$assign_subject_id = $request->assign_subject_id;
    //	$allData = AssignStudent::with(['student'])->where('semestre_id',$semestre_id)->where('module_id',$module_id)->where('element_id',$assign_subject_id)->get();
	    $element_id = AssignElement::select('element_id')->where('id',$assign_subject_id)->get();
        if(!StudentMarks::where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->exists())
	    $allData = AssignStudent::with(['student'])->where('annee_id',$annee_id)->where('semestre_id',$semestre_id)->where('element_id',$element_id['0']['element_id'])->get();
		else{
			/*$notification = array(
				'message' => 'Insertion est déja fait ',
				'alert-type' => 'success'
			);*/
			
		}
	return response()->json($allData);

    }




}
 